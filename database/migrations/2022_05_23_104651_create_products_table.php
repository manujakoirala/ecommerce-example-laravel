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
        Schema::create('products', function (Blueprint $table) {
            $table->id();        
            $table->BigInteger('categories_id')->unsigned(); 
            $table->BigInteger('subcategories_id')->unsigned();        
            $table->string('title', 100);
            $table->string('slug')->unique();
            $table->string('specification')->nullable();
            $table->float('price');
            $table->float('discount')->default(0);
            $table->integer('stock');
            $table->integer('quantity');
            $table->boolean('flash_key')->default(0);
            $table->boolean('hot_key')->default(0);
            $table->string('meta_title',100)->nullable();
            $table->string('meta_keyword',100)->nullable();
            $table->string('meta_description',100)->nullable();
            $table->string('description',100)->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('subcategories_id')->references('id')->on('subcategories');

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
};
