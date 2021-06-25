<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("stock_code")->nullable();
            $table->string("barcode")->nullable();
            $table->unsignedBigInteger("brand_id")->index();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger("category_id")->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string("image")->nullable();
            $table->double("price1",10,2)->nullable();
            $table->double("price2",10,2)->nullable();
            $table->integer("quantity")->default(0);
            $table->longText("description")->nullable();
            $table->timestamps();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string("name")->nullable();
            $table->string("value")->nullable();
            $table->timestamps();
        });

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string("name")->nullable();
            $table->string("value")->nullable();
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
        Schema::dropIfExists('products');
    }
}
