<?php

namespace App\Http\Controllers\Core;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomOwnership;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\EnrollRoom;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function show_room(){
    // Ambil ID pengguna yang sedang login
        $user = Auth::user();
        $userId = Auth::id();

        // Ambil jumlah "My Rooms" dari RoomOwnership
        $myRoomsCount = RoomOwnership::where('user_id', $userId)->count();

        // Ambil jumlah "Joined Rooms" dari Room
        $joinedRoomsCount = EnrollRoom::where('user_id',$userId)->count();


        $myRooms =  RoomOwnership::where('user_id', $userId)->latest()->take(4)->get()->map(function ($enroll) {
                        return $enroll->room;
                    });;

        $joinedRooms =  EnrollRoom::where('user_id', $userId)->latest()->take(4)->get()->map(function ($enroll) {
                        return $enroll->room;
                    });;
      
       
    return view('dashboard.core.room.rooms-main', [
        'myRoomsCount' => $myRoomsCount,
        'joinedRoomsCount' => $joinedRoomsCount,
        'myRooms' => $myRooms,
        'joinedRooms' => $joinedRooms,
    ]);
    }

    public function show_create_room(){
        return view('dashboard.core.room.create-rooms');
    }

    public function show_my_room(){
        $user = Auth::user();
        $room_ownerships = $user->room_ownerships;

        $rooms =  $room_ownerships->map(function ($ownership) {
            return $ownership->room;
        });

    
      
        return view('dashboard.core.room.myrooms',[
            'rooms' => $rooms
        ]);
    }

    public function show_myroom_details(Room $room)
    {
       
        $attendances = Attendance::where('room_id', $room->id)->get();
        return view('dashboard.core.room.myrooms-details',[
            'room_id' => $room->id,
            'room_name' => $room->name,
            'room_desc' => $room->description,
            'room_code' => $room->room_code,
            'attendances' => $attendances
    
        ]);
    }


    public function show_joined_room(){
        $enroll_room = EnrollRoom::where('user_id', auth()->user()->id)->get();

        $rooms =  $enroll_room->map(function ($enroll) {
            return $enroll->room;
        });
        
        

        return view('dashboard.core.room.joined-room',[
            'rooms' => $rooms
        ]);
    }

    public function show_joined_room_details(Room $room){
         
        $attendances = Attendance::where('room_id', $room->id)->get();
        $owner = $room->roomOwnership->user;
        
        return view('dashboard.core.room.joinedrooms-details',[
                "owner" => $owner,
                'room_id' => $room->id,
                'room_name' => $room->name,
                'room_desc' => $room->description,
                'room_code' => $room->room_code,
                'attendances' => $attendances
        
            
        ]);
    }
    

    public function show_member_room(Room $room){
        $participants = $room->enrollRoom->map(function($enroll){
            return $enroll->user;
        });

        $owner = $room->roomOwnership->user;
       

 
        return view('dashboard.core.room.members-room',[
            'owner' => $owner,
            'participants' => $participants
        ]);
    }
    public function enroll_room(Request $request){
       
    
        $validated = $request->validate([
            'room_code' => 'required',
        ]);
        $room = Room::where('room_code', $request->room_code)->first();

        $data_enroll = [
            "room_id" => $room->id,
            "user_id" => Auth::user()->id
        ];

        EnrollRoom::create($data_enroll);
        return redirect()->route('show-joinedrooms')
        ->with('success', 'Item created successfully.');

     
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'room_type' => 'required|string|in:office,school',
            'room_code' => 'string'
        ]);
        
        DB::beginTransaction();

        try {
            $validated['status'] = true;
            $new_room = Room::create($validated);

            RoomOwnership::create([
                'user_id' => auth()->user()->id,
                'room_id' => $new_room->id
            ]);

            DB::commit();

            return redirect()->route('show-rooms')
            ->with('success', 'Item created successfully.');
        
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
