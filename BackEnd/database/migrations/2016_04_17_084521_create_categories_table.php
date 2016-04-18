<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->SoftDeletes();
            $table->timestamps();
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                        ->references('id')
                        ->on('products')
                        ->onDelete('cascade');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                        ->references('id')
                        ->on('categories')
                        ->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('category_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                        ->references('id')
                        ->on('categories')
                        ->onDelete('cascade');
            
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
        Schema::drop('category_product');
        Schema::drop('category_user');
        Schema::drop('categories');
    }
}
