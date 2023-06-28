<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('clients_carts', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->decimal('product_price', 8, 2);
            $table->date('expiration_date');
            $table->boolean('perishable_product');
            $table->integer('stock_quantity');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_clients_carts');
    }
}
