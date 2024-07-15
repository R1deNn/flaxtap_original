<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function your_orders()
    {
        return view('dashboard-yourorders');
    }

    public function dashboard_settings()
    {
        return view('dashboard');
    }
}
