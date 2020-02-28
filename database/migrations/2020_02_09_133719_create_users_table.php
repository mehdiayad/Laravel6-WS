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
            $table->Increments('id');
            $table->string('name',30);
            $table->string('login',30)->unique();
            $table->string('email',50)->unique();
            $table->string('password',100);
            $table->string('role',3)->default('RO');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps(); // created_at & updated_at
            $table->char('active',1)->default('1');
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
