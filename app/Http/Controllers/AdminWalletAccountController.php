<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\WalletAccount;
use Illuminate\Http\Request;

class AdminWalletAccountController extends Controller
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
        $wallet_accounts = WalletAccount::all();
        $wallets = Wallet::all();
        return view('admin.wallet-accounts.wallet-accounts', compact('wallet_accounts', 'wallets'));
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
            'wallet_id' => 'required',
            'contact' => 'required',
            'status' => 'nullable'
        ]);
        $data['status'] = (empty($data['status']) ? false : true);
        $data = WalletAccount::create($data);
        if (!empty($data->id)) {
            return back()->with(notification('success', 'Successfully Wallet Account Added'));
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
            'contact' => 'required',
            'status' => 'nullable'
        ]);
        $data['status'] = (empty($data['status']) ? false : true);
        $wallet = WalletAccount::find($id);
        if ($wallet->update($data)) {
            return back()->with(notification('success', 'Successfully Wallet Account Updated'));
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
        if (WalletAccount::where('id', $id)->delete()) {
            return back()->with(notification('success', 'Successfully Deleted'));
        } else {
            return back()->with(notification('error', 'Something Went Wrong'));
        }
    }
}
