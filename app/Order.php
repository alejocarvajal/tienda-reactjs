<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    /**
     * Productos del pedido
     * @return \Illuminate\Support\Collection
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'detail_orders')->withPivot('quantity');
    }

    public function FinalOrder() {
        $orders = DB::table('order_products')
            ->join('final_orders', 'order_products.id', '=', 'final_orders.order_product_id')
            ->select('final_orders.id')
            ->get();
        return $orders;
    }
}
