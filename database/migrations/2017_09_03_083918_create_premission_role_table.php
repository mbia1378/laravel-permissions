<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(! Schema::hasTable('permission_role')) {
          Schema::create('permission_role', function (Blueprint $table) {
              $table->integer('permission_id')->unsigned()->nullable();
              $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
              $table->integer('role_id')->unsigned()->nullable();
              $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

          });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
