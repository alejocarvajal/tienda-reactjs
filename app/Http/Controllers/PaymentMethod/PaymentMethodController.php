<?php

namespace App\Http\Controllers\PaymentMethod;

use App\CreditCard;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPaymentMethodRequest;
use App\PaymentMethod;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentMethodController extends Controller
{

    /**
     * Metodo para llevar a la vista de registro
     *
     * @return View de registro o si ya esta logueado al listado de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function register()
    {
        if (auth()->check()) {
            $current_user = User::find(Auth::id());
            $credit_card_data = $current_user->credit_card;
            return view('paymentmethod.register',compact('credit_card_data'));
        } else {
            $cart = new CartController();
            return $cart->index();
        }
    }

    /**
     * Metodo para registrar el metodo de pago
     *
     * @param RegisterPaymentMethodRequest datos de tarjeta de credito
     * @return View listado de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function store(RegisterPaymentMethodRequest $request)
    {
        $current_user = User::find(Auth::id());

        if($current_user->credit_card()->count()) {
            $current_user->credit_card()->update([
                'name' => $request->creditcard_name,
                'number' => $request->creditcard_number,
                'code' => $request->creditcard_code,
                'date' => $request->creditcard_date,
            ]);
        }else{
            $credit_card = CreditCard::create([
                'name' => $request->creditcard_name,
                'number' => $request->creditcard_number,
                'code' => $request->creditcard_code,
                'date' => $request->creditcard_date,
            ]);
            $current_user->credit_card_id = $credit_card->id;
            $current_user->update();
        }

        $cart = new CartController();
        return $cart->index();
    }
}
