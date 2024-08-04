<?php

namespace App\Http\Controllers\Core;

use App\Models\EnrollRoom;
use Illuminate\Http\Request;
use App\Models\RoomOwnership;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show_dashboard(){
        $user = Auth::user();
        $userId = Auth::id();

        // Ambil jumlah "My Rooms" dari RoomOwnership
        $myRoomsCount = RoomOwnership::where('user_id', $userId)->count();

        // Ambil jumlah "Joined Rooms" dari Room
        $joinedRoomsCount = EnrollRoom::where('user_id',$userId)->count();
        
        $enroll_room = EnrollRoom::where('user_id',$userId)->get();

      

        $list_absente = $enroll_room->map(function($enroll){
            return $enroll->room->attendance;
        });


        return view('dashboard.dashboard-main',[
            'myRoomsCount' => $myRoomsCount,
            'joinedRoomsCount' => $joinedRoomsCount,
            'list_absente' => $list_absente
        ]);
    }
}
