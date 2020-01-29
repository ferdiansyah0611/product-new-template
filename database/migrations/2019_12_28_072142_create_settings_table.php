<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('amount_show')->nullable();
            $table->string('show_notification')->nullable();
            $table->boolean('IO_notification')->default('1');
            $table->string('mode')->nullable();
            $table->string('head_size')->nullable();
            $table->string('text_size')->nullable();
            $table->string('body_color')->default('aquamarine');
            $table->string('header_color')->default('white');
            $table->string('footer_color')->default('black');
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
        Schema::dropIfExists('settings');
    }
}
