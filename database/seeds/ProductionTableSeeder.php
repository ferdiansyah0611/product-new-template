<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 100000; $i++) {
            DB::table('productions')->insert([
            'id' => rand(1000000,10000000),
            'user_id' => '3711268',
            'title' => 'product '.rand(1000000,10000000),
            'name_products' => 'product '.rand(1000000,10000000),
            'price' => rand(999, 1000000),
            'discount' => rand(1,10),
            'conditions' => rand(1,2),
            'description_products' => 'description '.rand(1000000,10000000),
            'remaining_products' => rand(100, 10000),
            'main_pictures' => 'img1_Screenshot(28).png',
            'category_products' => 'SSD',
            'status' => 'Public',
            'profits' => rand(1000, 5000),
            'month' => Carbon::now()->get('month'),
            'year' => Carbon::now()->get('year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
}
