<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $products = $this->getProducts();
        $creditcard = $this->getCreditCard();

        return view('cart.index', compact('products', 'creditcard'));
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
        $creditcard = $this->getCreditCard();
        $idpedido = rand(1, 1000);

        return view('cart.index', compact('products', 'creditcard', 'idpedido'));
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
        $creditcard = [
            'creditcard_name' => Session::exists('creditcard_name') ? Session::get('creditcard_name') : '',
            'creditcard_number' => Session::exists('creditcard_number') ? Session::get('creditcard_number') : '',
            'creditcard_code' => Session::exists('creditcard_code') ? Session::get('creditcard_code') : '',
            'creditcard_date' => Session::exists('creditcard_date') ? Session::get('creditcard_date') : '',
        ];
        return $creditcard;
    }
}
