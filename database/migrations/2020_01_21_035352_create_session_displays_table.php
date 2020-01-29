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
            $table->longText('user_id')->nullable();
            $table->string('body_background_color')->nullable();
            $table->string('body_background_image')->nullable();
            $table->string('body_background_image_attach')->nullable();
            $table->integer('body_font_size')->nullable();
            $table->integer('body_font_color')->nullable();//end
            $table->string('header_background_color')->nullable();
            $table->string('header_background_image')->nullable();
            $table->string('header_background_image_attach')->nullable();
            $table->string('header_position')->nullable();
            $table->integer('header_font_size')->nullable();
            $table->integer('header_font_color')->nullable();//end
            $table->string('footer_background_color')->nullable();
            $table->string('footer_background_image')->nullable();
            $table->string('footer_background_image_attach')->nullable();
            $table->string('footer_position')->nullable();
            $table->integer('footer_font_size')->nullable();
            $table->integer('footer_font_color')->nullable();//end
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
        Schema::dropIfExists('session_displays');
    }
}
