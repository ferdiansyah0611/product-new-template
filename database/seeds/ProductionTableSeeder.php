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
        for ($i=1; $i < 10001; $i++) {
            DB::table('productions')->insert([
            'user_id' => '8239137',
            'title' => 'product '.rand(100000000,1000000000),
            'name_products' => 'product-'.rand(100000000,1000000000),
            'price' => rand(999, 1000000),
            'discount' => rand(1,10),
            'conditions' => rand(1,2),
            'description_products' => 'description '.rand(100000000,1000000000),
            'remaining_products' => rand(100, 10000),
            'main_pictures' => '{"image_1":"img1_Screenshot(28).png","image_2":"img1_Screenshot(28).png","image_3":"IMG-20200101-WA0017.jpg","image_4":null,"image_5":null,"image_6":null,"image_7":null,"image_8":null,"image_9":null,"image_10":null}',
            'category_products' => 'Router',
            'status' => 'Public',
            'profits' => rand(1000, 5000),
            'me' => rand(999, 10000),
            'month' => Carbon::now()->get('month'),
            'year' => Carbon::now()->get('year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
}
