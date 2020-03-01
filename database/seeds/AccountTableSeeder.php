<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i < 100; $i++) { 
            DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'mail_'.rand(1000000000,10000000000).'@gmail.com',
            'password' => Hash::make('password'),
            'role' => rand(0,5),
            'status' => 'None',
            'last_study' => 'Vocation School',
            'debit_card' => rand(10000000, 100000000),
            'number' => rand(10000000, 100000000),
            'identity_card' => rand(10000000, 100000000),
            'debit_card' => rand(10000000, 100000000),
            'locate' => $faker->address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
}
