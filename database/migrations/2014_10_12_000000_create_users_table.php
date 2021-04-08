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
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('position')->default('1');
            $table->string('department_id')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
        });

         DB::table('users')->insert(
            array(
                'name'  => 'admin',
                'email' => 'admin@gmail.com',
                'password'  => '$2y$10$Em8eTr9exjBcSV9GI7YgTuNYrYy7jDUD04ogzF6aRIM6GP3ZIqwbG',
                'position'     => 1,
                'department_id'  => null,
            ));
        DB::table('users')->insert(
            array(
                'name'  => 'manager',
                'email' => 'manager@gmail.com',
                'password'  => '$2y$10$Em8eTr9exjBcSV9GI7YgTuNYrYy7jDUD04ogzF6aRIM6GP3ZIqwbG',
                'position'     => 2,
                'department_id'  => null
            )); 

        DB::table('users')->insert(
            array(
                'name'  => 'user',
                'email' => 'user@gmail.com',
                'password'  => '$2y$10$Em8eTr9exjBcSV9GI7YgTuNYrYy7jDUD04ogzF6aRIM6GP3ZIqwbG',
                'position'     => 3,
                'department_id'  => null
            )); 
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
