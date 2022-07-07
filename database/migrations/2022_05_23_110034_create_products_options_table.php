<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_options', function (Blueprint $table) {
            $table->id();        
            $table->BigInteger('product_id')->unsigned(); 
            $table->BigInteger('option_id')->unsigned();        
            $table->string('attribute_value', 100);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_options');
    }
};
