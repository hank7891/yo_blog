<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorys extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->timestamp('updated_at');
          $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('categorys');
    }
}
