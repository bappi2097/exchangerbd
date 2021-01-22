<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // dd($user->orders);
        // $orders = User::find(Auth::id())->orders()->where('status', '!=', 0)->get();
        return view('users.history', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'send_wallet_name' => 'required|string|max:255',
            'wallet_account_id' => 'required|numeric',
            'send_amount' => 'required|numeric',
            'sending_contact' => 'required|string|max:255',
            'tnxid' => 'required|string|max:255|unique:orders,tnxid',
            'receive_wallet_name' => 'required|string|max:255',
            'receiving_contact' => 'required|string|max:255',
            'receive_amount' => 'required|numeric'
        ]);
        $data['user_id'] = Auth::id();
        $send_wallet = Wallet::where('name', $data['send_wallet_name'])->first();
        $receive_wallet = Wallet::where('name', $data['receive_wallet_name'])->first();
        $value = floatval($data['send_amount']);
        if ($send_wallet->is_bd) {
            if ($value < $send_wallet->minimum) {
                return back()->with(notification('error', 'Minimum Transection is 1000 Taka'));
            }
            $amount = $value / $receive_wallet->sell;
            $amount -= $value < $receive_wallet->minimum * 100 ? $receive_wallet->cost : 0;
        } else {
            if ($value < $send_wallet->minimum) {
                return back()->with(notification('error', 'Minimum Transection is 10 USD'));
            }
            $amount = $value * $send_wallet->buy;
        }
        $data['receive_amount'] = $amount;
        $data = Order::create($data);
        if (!empty($data->id)) {
            return back()->with(notification('success', 'Successfully Order Placed, It will take some time for processing'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
