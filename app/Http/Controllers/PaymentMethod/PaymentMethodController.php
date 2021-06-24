<?php

namespace App\Http\Controllers\PaymentMethod;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPaymentMethodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentMethodController extends Controller
{
    public function register() {
        if (!Session::exists('login')) {
            return view('buystate.index');
        }
        return view('paymentmethod.register');
    }
    public function save(RegisterPaymentMethodRequest $request) {
        if ($request->session()->exists('creditcard-number')) {
            session([
                'creditcard_name' => $request->creditcard_name,
                'creditcard_number' => $request->creditcard_number,
                'creditcard_code' => $request->creditcard_code,
                'creditcard_date' => $request->creditcard_date,
            ]);
        }else {
            $request->session()->put('creditcard_name', $request->creditcard_name);
            $request->session()->put('creditcard_number', $request->creditcard_number);
            $request->session()->put('creditcard_code', $request->creditcard_code);
            $request->session()->put('creditcard_date', $request->creditcard_date);
        }
        return view('layouts.main');
    }
}
