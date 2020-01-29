<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1000)->create([
        	'password' => Hash::make('password'),
        	'role' => '2',
        	'status' => 'None',
        	'last_study' => 'Vocation School',
        	'debit_card' => rand(10000000, 100000000),
        	'number' => rand(10000000, 100000000),
        	'identity_card' => rand(10000000, 100000000),
        	'debit_card' => rand(10000000, 100000000),
        	'locate' => 'United States',
        ]);
    }
}
