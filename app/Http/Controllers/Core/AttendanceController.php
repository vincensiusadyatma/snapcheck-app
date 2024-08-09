<?php

namespace App\Http\Controllers\Core;

use Carbon\Carbon;
use Mockery\Matcher\Any;
use App\Models\Attendance;
use App\Models\EnrollRoom;
use Illuminate\Http\Request;
use App\Models\EnrollAttendance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{

    public function show_attendance_main(){
        $user = Auth::user();
        $enroll_room = EnrollRoom::where('user_id',$user->id)->get();

        // Ambil ID attendance yang ada di tabel EnrollAttendance untuk user_id tertentu
        $enrolledAttendanceIds = EnrollAttendance::where('user_id', auth()->id())->pluck('attendance_id');

        // Ambil attendance dari setiap room dan filter berdasarkan ID
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
            
                // menambah informasi sisa waktu ke objek attendance
                
                $attendance->remaining_time = [
                    'days' => round($diffInDays),
                    'hours' => round($diffInHours),
                    'minutes' => round($diffInMinutes),
                    'seconds' => round($diffInSeconds),
                ];

                if ($endTime->isPast()) {
                    $attendance->status = 'Late';
                } else {
                    $attendance->status = 'on time';
                }
            
                return $attendance;
            });
        }); 
        

        

        return view('dashboard.core.attendance.attendance',[
            'attendances' => $list_attendances
        ]);
    }

    public function show_details_attendanceAdmin(Attendance $attendance){
      // Eager load 'user' relation to avoid N+1 problem
            $absentees = EnrollAttendance::with('user')
            ->where('attendance_id', $attendance->id)
            ->get();

        
        return view('dashboard.core.attendance.attendance-details_admin', [
            'attendance' => $attendance,
            'absentees' => $absentees
        ]);
    }
    public function show_details_attendanceUser(Attendance $attendance){

        $endTime = $attendance->end_time;
        $now = Carbon::now();
    
        $diffInDays = $now->diffInDays($endTime);
        $diffInHours = $now->diffInHours($endTime) % 24;
        $diffInMinutes = $now->diffInMinutes($endTime) % 60;
        $diffInSeconds = $now->diffInSeconds($endTime) % 60;
    
        // menambah informasi sisa waktu ke objek attendance
        
        $attendance->remaining_time = [
            'days' => round($diffInDays),
            'hours' => round($diffInHours),
            'minutes' => round($diffInMinutes),
            'seconds' => round($diffInSeconds),
        ];

        if ($endTime->isPast()) {
            $attendance->status = 'Late';
        } else {
            $attendance->status = 'on time';
        }
        
  

        return view('dashboard.core.attendance.attendance-details_user',[
            'attendance' => $attendance
        ]);
    }


    // this fuction fow show view for every attedace from user enroll
    public function show_user_details_attendance(Attendance $attendance, EnrollAttendance $enroll){
       
        return view('dashboard.core.attendance.user-enroll-attendance-details',[
            "attendance" => $attendance,
            "enroll" => $enroll
        ]);
    }


    public function create(Request $request){
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'room_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            Attendance::create($validated);
            DB::commit();
            return redirect()->route('show-myrooms-details')>with('success', 'Item created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }


    public function enroll_attendace(Request $request){
        $validated = $request->validate([
            'attendance_status' => 'required',
            'location' => 'required',
            'photo' => 'required|image|max:10240', // max 10MB
            'device_info' => 'required|string',
            'os_info' => 'required|string',
            
        ]);
        

            // Ambil data lokasi dari input form
        $location = $request->input('location');
        $ipAddress = $request->ip();

        // Pisahkan string lokasi menjadi latitude dan longitude
        if (preg_match('/Latitude:\s*(-?\d+\.\d+),\s*Longitude:\s*(-?\d+\.\d+)/i', $location, $matches)) {
            $latitude = $matches[1];
            $longitude = $matches[2];
        } 

      
     
       
       
        
        // Dapatkan ID attendance
        $attendanceId = $request->attendance_id; // Ganti dengan ID attendance yang sesuai
      
        // Buat jalur folder untuk attendance
        $folderPath = 'photos/attendance_' . $attendanceId;
        
        // Upload photo ke folder yang sesuai
        $path = $request->file('photo')->store($folderPath, 'public');
        
    


        // Simpan data ke database
        EnrollAttendance::create([
            'user_id' => Auth::id(),
            'attendance_id' => $attendanceId,
            'check_in_time' => now(),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'photo' => $path,
            'device_info' => $request->input('device_info'),
            'os_info' => $request->input('os_info'),
            'ip_address' => $ipAddress
        ]);
        
        return redirect()->route('show-attendance-user-details',['attendance'=> $attendanceId])->with('success', 'Attendance recorded successfully.');
        
    }
}
