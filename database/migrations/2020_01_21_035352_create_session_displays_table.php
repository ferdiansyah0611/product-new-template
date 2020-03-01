<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_displays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('navbar')->default('navbar-light');
            $table->string('navbar_font_size')->default('14 px');
            $table->string('main_menu')->default('menu-dark');
            $table->string('main_menu_status')->default('menu-expanded');
            $table->string('main_menu_font_size')->default('14 px');
            $table->string('body_color')->nullable();
            $table->string('body_walpaper')->nullable();
            $table->string('body_page')->default('multiview');//multiview
            $table->string('animate_status')->default('slideInLeft');
            $table->string('animate_time')->default('1s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
main_menu_font_size
body_color


body_page


animate_status


anime_time
     */
    public function down()
    {
        Schema::dropIfExists('session_displays');
    }
}
