<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->string('name_products');
            $table->longtext('price');
            $table->longtext('description_products');
            $table->string('remaining_products');
            $table->string('main_pictures');
            $table->string('second_pictures')->nullable();
            $table->string('three_pictures')->nullable();
            $table->string('fourth_pictures')->nullable();
            $table->string('five_pictures')->nullable();
            $table->string('category_products')->nullable();
            $table->bigInteger('discount')->nullable();
            $table->string('conditions')->nullable();
            $table->bigInteger('sold_out')->nullable();
            $table->bigInteger('profits')->nullable();
            $table->bigInteger('me')->nullable();
            $table->string('size')->nullable();
            $table->string('status')->nullable();
            $table->boolean('count')->default('1');
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productions');
    }
}
