<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function show_login(){
        return view('auth.login');
    }

    public function show_register(){
        return view('auth.register');
    }


    public function handle_login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            // Mengambil username dari kredensial
            $username = $credentials['username'];
    
            // Redirect ke rute 'show-dashboard' dengan parameter 'user'
            return redirect()->route('show-dashboard', ['user' => $username])
                             ->with('success', 'Item created successfully.');
        }
    
        // Jika autentikasi gagal
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function handle_register(Request $request): RedirectResponse
    {
      

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string',
            'password_verify' => 'required|string|same:password'
        ]);
   
        
        DB::beginTransaction();

        try {
            unset($validated['password_verify']);
            $username = $validated['username'];
            
            $new_user = User::create($validated);
            $new_user->assignRole('user');
          

            DB::commit();

            Auth::login($new_user);

            return redirect()->route('show-dashboard', ['user' => $username])
            ->with('success', 'Item created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
    
           
        }

        
    }

    public function handle_logout(Request $request){
        Auth::logout();

        return redirect()->route('landing-main')->with('success', 'You have been logged out.');
    }
}
