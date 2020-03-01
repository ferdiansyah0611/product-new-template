<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
            $table->string('name');
			$table->string('name_store');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('saldo')->default('10000');
            $table->boolean('role')->nullable();
            $table->string('status')->nullable();
            $table->string('last_study')->nullable();
            $table->string('identity_card')->nullable();
            $table->string('debit_card')->nullable();
            $table->string('number')->nullable();
            $table->date('born')->nullable();
            $table->longtext('description')->nullable();
            $table->string('locate')->nullable();
            $table->string('avatars')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
