<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Notice;
use App\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.home', ['user' => Auth::user(), 'orders' => Order::all(), 'notices' => Notice::where('is_active', true)->get()]);
    }
}
