<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show_profile(){
        return view('dashboard.core.profile.profile');
    }
}
