<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('position_id');
            $table->string('read');
            $table->string('write');
            $table->string('update');
            $table->string('delete');
            $table->timestamps();
        });

        DB::table('permissions')->insert(
            array(
                'position_id'=> 1,
                'read'       => 1,
                'write'      => 1,
                'update'     => 1,
                'delete'     => 1
            ));
        DB::table('permissions')->insert(
            array(
                'position_id'=> 2,
                'read'       => 1,
                'write'      => 1,
                'update'     => 1,
                'delete'     => 0
            ));
        DB::table('permissions')->insert(
            array(
                'position_id'=> 3,
                'read'       => 1,
                'write'      => 0,
                'update'     => 0,
                'delete'     => 0
            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
