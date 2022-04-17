<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->bigInteger("role_id")->index()->unsigned()->nullable(false);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')
            ->insert([
                [
                    "role_id" => 1,
                    "name" => "admin",
                    "email" => "admin@mail.ru",
                    "password" => Hash::make("admin"),
                ],
                [
                    "role_id" => 2,
                    "name" => "user1",
                    "email" => "user1@mail.ru",
                    "password" => Hash::make("user1"),
                ],
                [
                    "role_id" => 2,
                    "name" => "user2",
                    "email" => "user2@mail.ru",
                    "password" => Hash::make("user2"),
                ],
            ]);

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
