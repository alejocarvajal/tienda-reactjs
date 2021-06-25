<?php

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_products')->insert(
            [
                [
                    'quantity' => 1,
                    'user_id' => 1,
                    'product_id' => 1,
                    'status' => 0
                ],
                [
                    'quantity' => 2,
                    'user_id' => 1,
                    'product_id' => 2,
                    'status' => 1,
                ]
            ]);
    }
}
