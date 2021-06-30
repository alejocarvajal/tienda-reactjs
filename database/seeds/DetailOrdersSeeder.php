<?php

use Illuminate\Database\Seeder;

class DetailOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_orders')->insert(
            [
                [
                    'order_id' => 1,
                    'product_id' => 1,
                    'quantity' => 1
                ],
                [
                    'order_id' => 1,
                    'product_id' => 2,
                    'quantity' => 2
                ]
            ]);
    }
}
