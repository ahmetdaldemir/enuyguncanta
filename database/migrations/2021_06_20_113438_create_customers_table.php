<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("type",30);
            $table->string("firstname");
            $table->string("lastname");
            $table->string("tel")->nullable();
            $table->string("email")->unique();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("password");
            $table->string("address")->nullable();
            $table->string("tax_office")->nullable();
            $table->string("tax_number")->nullable();
            $table->string("tax_title")->nullable();
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
        Schema::dropIfExists('customers');
    }
}
