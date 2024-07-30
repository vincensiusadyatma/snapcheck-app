<?php

namespace App\Http\Controllers\Core;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomOwnership;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function show_room(){
        return view('dashboard.core.room.rooms-main');
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
       
        
        return view('dashboard.core.room.myrooms-details',[
            'room_name' => $room->name,
            'room_desc' => $room->description,
    
        ]);
    }
    

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'room_type' => 'required|string|in:office,school',
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

            return redirect()->route('show-rooms', ['user' => auth()->user()->username])
            ->with('success', 'Item created successfully.');
        
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
