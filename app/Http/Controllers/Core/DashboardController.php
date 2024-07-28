<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show_dashboard(){
        return view('dashboard.dashboard-main');
    }
}
