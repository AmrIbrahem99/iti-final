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
            $table->id();
            $table->string('user_name');
            $table->string('full_name')->nullable();;;
            $table->string('phone')->nullable();;;
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('bio')->nullable();;
            $table->string('website')->nullable();;
            $table->binary('avatar')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('facebook_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
