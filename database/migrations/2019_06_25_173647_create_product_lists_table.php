<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
           $table->increments('id')->length(10);
           $table->integer('category_id')->length(10);
           $table->string('product_name', 150);
           $table->string('product_number', 100);
           $table->integer('party_id')->length(10);
           $table->string('barcode', 100);
           $table->double('sale_price', 10, 10);
           $table->integer('print_quantity')->length(10);
           $table->tinyInteger('published')->length(4);
           $table->tinyInteger('deleted')->length(4);
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
        Schema::dropIfExists('product_lists');
    }
}
