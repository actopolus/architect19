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
            // системные данные
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            // анкета
            $table->string('firstname');
            $table->string('lastname');
            $table->string('city');
            $table->text('interests');
            $table->unsignedTinyInteger('age');
            $table->boolean('gender');
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
