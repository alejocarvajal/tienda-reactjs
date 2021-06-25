<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
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
    public function save()
    {
        $products = $this->getProducts();
        $credit_card_data = $this->getCreditCard();
        $idpedido = rand(1, 1000);

        return view('cart.index', compact('products', 'credit_card_data', 'idpedido'));
    }

    /**
     * Metodo para obtener el listado de pedidos
     *
     * @return Array de productos
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    private function getProducts()
    {
        $products = [
            [
                'id' => 1,
                'product' => 'Producto 1',
                'price' => '50.000',
                'quantity' => '1',
                'total' => '50.000'
            ],
            [
                'id' => 2,
                'product' => 'Producto 2',
                'price' => '60.000',
                'quantity' => '2',
                'total' => '120.000'
            ]
        ];
        return $products;
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
