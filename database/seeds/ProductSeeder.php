<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [[
                'name' => 'Producto 1',
                'price' => '50000',
                'description' => 'Descripcion producto 1'
            ],
                [
                    'name' => 'Producto 2',
                    'price' => '60000',
                    'description' => 'Descripcion producto 2'
                ]]);
    }
}
