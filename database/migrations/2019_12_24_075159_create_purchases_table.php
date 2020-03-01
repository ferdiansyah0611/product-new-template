<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('production_id');
            $table->longtext('purchase_id');
            $table->unsignedBigInteger('user_id');
            $table->string('price');
            $table->string('sum_purchase');
            $table->string('totals');
            $table->bigInteger('profits')->nullable();
            $table->bigInteger('me');
            $table->string('status');
            $table->string('locate');
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
        Schema::dropIfExists('purchases');
    }
}
