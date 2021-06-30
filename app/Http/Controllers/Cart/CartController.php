<?php

namespace App\Http\Controllers\Cart;

use App\DetailOrder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentMethod\PaymentMethodController;
use App\Http\Requests\CartRequest;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::id());
        $order = $user->Order;
        $credit_card = $user->credit_card;

        return view('cart.index', compact('order', 'credit_card'));
    }

    /**
     * Metodo para generar el id del pedido
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function save(CartRequest $request)
    {
        $order = Order::find($request->ordernumber);
        $order->update(['status' => 'Pendiente']);
        $order->save();
        $paymentMethod = new PaymentMethodController();
        $paymentMethod = $paymentMethod->createUpdateCreditCard($request);

        $credit_card = $paymentMethod->credit_card;


        return view('cart.index', compact('order', 'credit_card'));
    }


}
