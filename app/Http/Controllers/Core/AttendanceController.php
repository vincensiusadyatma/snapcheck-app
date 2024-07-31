<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Mockery\Matcher\Any;

class AttendanceController extends Controller
{


    public function show_details_attendanceAdmin(Attendance $attendance){
       
        return view('dashboard.core.attendance.attendance-details_admin',[
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
}
