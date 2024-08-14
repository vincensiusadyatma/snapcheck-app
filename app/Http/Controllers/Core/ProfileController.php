<?php
namespace App\Http\Controllers\Core;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();

    
        // Validasi input
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        DB::beginTransaction();
        
        try {
            if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
                $validated['photo_path'] = $request->file('photo_path')->store('photo_profile', 'public');
            } else {
                // Jika file tidak ada atau tidak valid, gunakan yang lama
                $validated['photo_path'] = $user->photo_path;
            }
            
    
            // Update user data
            User::where('id', $user->id)->update($validated);
            
            DB::commit();
            
            return response()->json(['message' => 'Profile updated successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json(['message' => 'Failed to update profile.', 'error' => $e->getMessage()], 500);
        }
    }
    public function show_profile(){
        return view('dashboard.core.profile.profile');
    }

    public function show_users_profile(User $user){
        return view('dashboard.core.profile.user-profile',[
            "user" => $user
        ]);
    }
}
