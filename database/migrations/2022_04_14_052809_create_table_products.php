<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("article")->unique()->nullable(false);
            $table->string("name")->nullable(false);
            $table->string("status")->nullable(false);
            $table->jsonb("data")->nullable(false);
            $table->timestamp("created_at")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp("updated_at")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });

        DB::table('users')
            ->insert([
                [
                    "article" => ,
                    "name" => "admin",
                    "status" => "available",
                    "password" => Hash::make("admin"),
                ],
                [
                    "role_id" => 2,
                    "name" => "user1",
                    "email" => "user1@mail.ru",
                    "password" => Hash::make("user1"),
                ]
            ]);


    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
