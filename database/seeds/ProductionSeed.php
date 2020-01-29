<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProductionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Production::class, 1000)->create([
        	'user_id' => '1',
            'name_products' => base64_encode(Str::random(100)),
            'price' => base64_encode(rand(1000, 10000)),
            'description_products' => Crypt::encrypt(Str::random(100)),
            'remaining_products' => rand(100, 10000),
            'main_pictures' => '/db/img/img1_v17-1.jpg',
            'category_products' => 'Laptop',
            'status' => 'Public',
        ]);
    }
}
