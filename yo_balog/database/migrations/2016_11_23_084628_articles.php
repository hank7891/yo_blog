<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('click')->default(0)->comment('點擊次數');
            $table->string('original')->nullable()->comment('參考來源');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->softDeletes();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categorys')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('articles');
    }
}
