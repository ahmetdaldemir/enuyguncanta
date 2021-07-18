<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->string("title")->default("Boş bırakmayınız!");
            $table->string("color")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('status_id')->index();
            $table->foreign('status_id')->references('id')->on('order_status')->onDelete('cascade');
            $table->double('amount',10,2);
            $table->double('custom_amount',10,2);
            $table->string('fullname')->nullable();
            $table->string('tel')->nullable();
            $table->string('mail')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('state_id')->index();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->boolean('printed')->default(0);
            $table->string('shipment_code')->nullable();
            $table->unsignedBigInteger('shipment_companies_id')->index()->nullable();
            $table->foreign('shipment_companies_id')->references('id')->on('shipment_companies')->onDelete('cascade');
            $table->enum("payment_type",['credit_card','cash','pay_of_door']);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id")->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->tinyInteger('quantity');
            $table->double('price',10,2);
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
        Schema::dropIfExists('orders');
    }
}
