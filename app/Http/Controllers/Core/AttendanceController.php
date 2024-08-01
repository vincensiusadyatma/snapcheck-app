<?php

namespace App\Http\Controllers\Core;

use Mockery\Matcher\Any;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EnrollAttendance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{


    public function show_details_attendanceAdmin(Attendance $attendance){
       
        return view('dashboard.core.attendance.attendance-details_admin',[
            'attendance' => $attendance
        ]);
    }
    public function show_details_attendanceUser(Attendance $attendance){
       
        return view('dashboard.core.attendance.attendance-details_user',[
            'attendance' => $attendance
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
        ]);
        
        // Debugging untuk memastikan data tervalidasi
       
        
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
            'location' => $request->input('location'),
            'photo' => $path,
        ]);
        
        return redirect()->route('show-attendance-user-details',['attendance'=> $attendanceId])->with('success', 'Attendance recorded successfully.');
        
    }
}
