<?php

namespace App\Http\Controllers\PaymentMethod;

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPaymentMethodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentMethodController extends Controller
{
    /**
     * Metodo para llevar a la vista de registro
     *
     * @return View de registro o si ya esta logueado al listado de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function register() {
        if (!Session::exists('login')) {
            $cart = new CartController();
            return $cart->index();
        }
        return view('paymentmethod.register');
    }
    /**
     * Metodo para registrar el metodo de pago
     *
     * @param RegisterPaymentMethodRequest datos de tarjeta de credito
     * @return View listado de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function save(RegisterPaymentMethodRequest $request) {
        if ($request->session()->exists('creditcard_number')) {
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
        $cart = new CartController();
        return $cart->index();
    }
}
