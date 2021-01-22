<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;

class AdminWalletController extends Controller
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
        $wallets = Wallet::all();
        return view('admin.wallet.wallet', compact('wallets'));
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
            'name' => 'required|string|max:255|unique:wallets',
            'buy' => 'required|numeric',
            'sell' => 'required|numeric',
            'reserve' => 'required|numeric',
            'minimum' => 'required|numeric',
            'cost' => 'required|numeric',
            'original_reserve' => 'required|numeric',
            'original_cost' => 'required|numeric',
            'wallet_img' => 'nullable|string',
            'is_bd' => 'nullable|string'
        ]);
        $data['is_bd'] = (empty($data['is_bd']) ? false : true);
        $data = Wallet::create($data);
        if (!empty($data->id)) {
            return back()->with(notification('success', 'Successfully New Wallet Created'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
        }
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
    public function update(Request $request)
    {
        $id = $this->validate($request, [
            'id' => 'required|numeric',
        ])['id'];

        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'buy' => 'required|numeric',
            'sell' => 'required|numeric',
            'minimum' => 'required|numeric',
            'reserve' => 'required|numeric',
            'cost' => 'required|numeric',
            'original_cost' => 'required|numeric',
            'original_reserve' => 'required|numeric',
            'wallet_img' => 'nullable|string',
            'is_bd' => 'nullable'
        ]);
        $data['is_bd'] = (empty($data['is_bd']) ? false : true);
        $wallet = Wallet::find($id);
        $data['reserve'] = floatval($data['reserve']) + $wallet->reserve; // For avoid summation
        $data['original_reserve'] = floatval($data['original_reserve']) + $wallet->original_reserve; // For avoid summation
        if ($wallet->update($data)) {
            return back()->with(notification('success', 'Successfully Wallet Updated'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong!'));
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
        if (Wallet::where('id', $id)->delete()) {
            return back()->with(notification('success', 'Successfully Deleted'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong'));
        }
    }
}
