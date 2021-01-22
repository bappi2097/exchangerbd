<?php

namespace App\Http\Controllers;

use App\Order;
use App\Wallet;
use Illuminate\Http\Request;

class AdminNewOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->get();
        return view('admin.new-order', compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $order = Order::find($id);
        $send_wallet = Wallet::where('name', $order->send_wallet_name)->first();
        $receive_wallet = Wallet::where('name', $order->receive_wallet_name)->first();
        $send_wallet->update([
            'reserve' => $send_wallet->reserve + $order->send_amount,
            'original_reserve' => $send_wallet->original_reserve + $order->send_amount
        ]);
        $receive_amount = $receive_wallet->is_bd ? $order->receive_amount + $receive_wallet->original_cost : $order->receive_amount * ($receive_wallet->original_cost / 100);
        $receive_wallet->update([
            'reserve' => $receive_wallet->reserve - $order->receive_amount,
            'original_reserve' => $receive_wallet->original_reserve - $receive_amount
        ]);
        if (Order::where('id', $id)->update(['status' => 1])) {
            return back()->with(notification('success', 'Successfully confirmed order'));
        } else {
            return back()->with(notification('error', 'Something went wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reject($id)
    {
        if (Order::where('id', $id)->update(['status' => 2])) {
            return back()->with(notification('success', 'Successfully rejected order'));
        } else {
            return back()->with(notification('error', 'Something went wrong!'));
        }
    }
}
