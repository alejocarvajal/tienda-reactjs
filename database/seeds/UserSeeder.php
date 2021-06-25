<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'lastname' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
            'address' => 'Carrera X # 5-2'
        ]);
    }
}
