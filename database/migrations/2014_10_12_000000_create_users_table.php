<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('nick_name', 40)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->datetime('last_active')->nullable();
            $table->datetime('banned')->nullable();
            $table->integer('xp')->default(10);
            $table->string('bio')->nullable();
            $table->boolean('changed_nick')->default(false);
            $table->integer('post_count')->default(0);
            $table->rememberToken();
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
