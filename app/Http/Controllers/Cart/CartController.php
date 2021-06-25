<?php

namespace App\Http\Controllers\Cart;

use App\FinalOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\OrderProduct;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = $this->getProducts();
        $credit_card_data = $this->getCreditCard();

        return view('cart.index', compact('products', 'credit_card_data'));
    }

    /**
     * Metodo para generar el id del pedido
     *
     * @return View de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function save(CartRequest $request)
    {
        $final = new OrderProduct();
        $final->FinalOrder();
        $products = $this->getProducts();
        $credit_card_data = $this->getCreditCard();

        if (!$final->FinalOrder()->count()) {
            $final_order = FinalOrder::create([
                'order_product_id' => $request->ordernumber
            ])->id;
        } else {
            $final_order = $final->FinalOrder();
            $final_order = $final_order[0]->id;
        }

        return view('cart.index', compact('products', 'credit_card_data', 'final_order'));
    }

    /**
     * Metodo para obtener el listado de pedidos
     *
     * @return Array de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    private function getProducts()
    {
        $products = new OrderProduct();

        return $products->products();
    }

    /**
     * Metodo para obtener tarjeta de credito si existe
     *
     * @return Array de datos tarjeta de credito
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    private function getCreditCard()
    {
        $creditcard = null;
        if (auth()->check()) {
            $current_user = User::find(Auth::id());
            $creditcard = $current_user->credit_card;
        }
        return $creditcard;
    }
}
