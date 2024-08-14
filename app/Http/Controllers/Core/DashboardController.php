<?php

namespace App\Http\Controllers\Core;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\EnrollRoom;
use Illuminate\Http\Request;
use App\Models\RoomOwnership;
use App\Models\EnrollAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show_dashboard(){
        $user = Auth::user();
        $userId = Auth::id();
    
        // Ambil jumlah "My Rooms" dari RoomOwnership
        $myRoomsCount = RoomOwnership::where('user_id', $userId)->count();
    
        // Ambil jumlah "Joined Rooms" dari EnrollRoom
        $joinedRoomsCount = EnrollRoom::where('user_id', $userId)->count();
        
        $enroll_room = EnrollRoom::where('user_id', $userId)->get();
    
        // Ambil ID attendance yang ada di tabel EnrollAttendance untuk user_id tertentu
        $enrolledAttendanceIds = EnrollAttendance::where('user_id', Auth::user()->id)->pluck('attendance_id');
    
        // Ambil semua attendance dari setiap room dan hanya ambil 4 yang terbaru
        $list_attendances = $enroll_room->flatMap(function($enroll) use ($enrolledAttendanceIds) {
            // Ambil semua attendance dari setiap room
            return $enroll->room->attendance->filter(function($attendance) use ($enrolledAttendanceIds) {
                // Just ambil attendance yang ID-nya tidak ada di EnrollAttendance
                return !$enrolledAttendanceIds->contains($attendance->id);
            })->map(function($attendance) {
                $endTime = $attendance->end_time;
                $now = Carbon::now();
            
                $diffInDays = $now->diffInDays($endTime);
                $diffInHours = $now->diffInHours($endTime) % 24;
                $diffInMinutes = $now->diffInMinutes($endTime) % 60;
                $diffInSeconds = $now->diffInSeconds($endTime) % 60;
            
                // Menambah informasi sisa waktu ke objek attendance
                $attendance->remaining_time = [
                    'days' => round($diffInDays),
                    'hours' => round($diffInHours),
                    'minutes' => round($diffInMinutes),
                    'seconds' => round($diffInSeconds),
                ];
    
                if ($endTime->isPast()) {
                    $attendance->status = 'Late';
                } else {
                    $attendance->status = 'On time';
                }
            
                return $attendance;
            });
        })->sortByDesc(function($attendance) {
            return $attendance->end_time; // Mengurutkan berdasarkan waktu akhir secara descending
        })->take(5); // Mengambil hanya 4 item terbaru
    
        $totalActivities = Attendance::count();
        $userActivities = EnrollAttendance::where('user_id', $userId)->count();
        if ($totalActivities > 0) {
            $activityPercentage = round(($userActivities / $totalActivities) * 100);
        } else {
            $activityPercentage = 0;
        }
    
        return view('dashboard.dashboard-main', [
            'myRoomsCount' => $myRoomsCount,
            'joinedRoomsCount' => $joinedRoomsCount,
            'list_attendances' => $list_attendances,
            'percentage' => $activityPercentage
        ]);
    }
    
}
