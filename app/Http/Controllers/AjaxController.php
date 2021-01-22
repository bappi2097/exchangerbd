<?php

namespace App\Http\Controllers;

use App\feedback;
use App\Wallet;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getFeedback()
    {
        $feedbacks = feedback::where('status', 2)->orderBy('index')->get();
        $datas = array();
        foreach ($feedbacks as $feedback) {
            $data['star'] = $feedback->rating;
            $data['feedback'] = $feedback->comment;
            $data['full_name'] = $feedback->user->firstname;
            $data['image'] = empty($feedback->user->image) ? asset('logo/human.png') : $feedback->user->image;
            if (!empty($feedback->comment)) {
                $datas[] = $data;
            }
        }
        return $datas;
    }
    public function getWallet()
    {
        $wallets = Wallet::select('name', 'buy', 'sell', 'reserve', 'is_bd', 'cost', 'minimum')->get();
        foreach ($wallets as $wallet) {
            if ($wallet->is_bd)
                $wallet->reserve += 30000;
            else
                $wallet->reserve += 300;
        }
        return $wallets;
    }

    public function postWalletOption(Request $request)
    {
        $wallet_contacts = Wallet::where('name', $request->name)->first()->walletAccounts()->where('status', true)->get();
        $wallets = Wallet::select('name')->where('is_bd', '!=', Wallet::select('is_bd')->where('name', $request->name)->first()->is_bd)->get();
        return ['wallet_contacts' => $wallet_contacts, 'wallets' => $wallets];
    }
    public function postCurrencyConversation(Request $request)
    {
        $name = $request->name;
        $value = floatval($request->value);
        if ($value <= 0) {
            return 0;
        }
        $type = $request->type;
        $data = Wallet::where('name', $name)->first();
        if ($data->is_bd) {
            $opposite = Wallet::where('name', $request->opposite)->first();
            if ($type == "send") {
                $amount = $value / $opposite->sell;
                $amount -= $value < $opposite->minimum * 100 ? $opposite->cost : 0;
            } else {
                $amount = $value / $opposite->buy;
            }
        } else {
            if ($type == "send") {
                $amount = $value * $data->buy;
            } else {
                $amount = $value * $data->sell;
                $amount += $value < $data->minimum ? $data->cost * 100 : 0;
            }
        }
        $data['value'] = floatval(number_format($amount > 0 ? $amount : 0, 2, '.', ''));
        return $data;
    }
}
