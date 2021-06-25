<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderProduct extends Model
{
    /**
     * Productos del pedido
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        $products = DB::table('order_products')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->select('order_products.id AS order_product_id',
                'products.id AS product_id', 'products.name', 'products.price','order_products.quantity', 'products.description')
            ->where([
                ['order_products.user_id', '=', Auth::id()]
            ])
            ->get();
        return $products;
    }

    public function FinalOrder() {
        $orders = DB::table('order_products')
            ->join('final_orders', 'order_products.id', '=', 'final_orders.order_product_id')
            ->select('final_orders.id')
            ->get();
        return $orders;
    }
}
