<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function your_orders()
    {
        return view('dashboard-yourorders',[
            'orders' => Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function dashboard_settings()
    {
        return view('dashboard',[

        ]);
    }
}
