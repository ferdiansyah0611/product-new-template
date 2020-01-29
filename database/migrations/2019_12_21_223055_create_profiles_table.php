<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('last_study')->nullable();
            $table->string('identity_card')->nullable();
            $table->string('debit_card')->nullable();
            $table->string('number')->nullable();
            $table->date('hbd')->nullable();
            $table->longtext('description')->nullable();
            $table->string('locate');
            $table->string('avatars')->nullable();
            $table->boolean('count')->default('1');
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
        Schema::dropIfExists('profiles');
    }
}
