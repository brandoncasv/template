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
            $table->unsignedBigInteger('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('deleted_by')->unsigned()->index()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('restrict');
            $table->string('deleted_reason')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->smallInteger('status')->default('15');

            $table->string('avatar')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('firstname')->nullable();
            $table->string('lastname1')->nullable();
            $table->string('lastname2')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->text('description')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('language')->nullable();
            $table->string('social_login')->nullable();
            $table->string('social_id')->nullable();
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
