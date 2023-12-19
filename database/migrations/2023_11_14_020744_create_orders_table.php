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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('product_Id'); 
            $table->foreign('product_Id')->references('product_id')->on('products');
            $table->string('deliveredto');
            $table->string('address');
            $table->date('date');
            $table->integer('quantity');
            $table->integer('totalamount');
            $table->integer('terms');
            $table->integer('po');
            $table->string('deliveredby');
            $table->string('doctor_name');
            $table->string('contact_num');
            $table->unsignedBigInteger('or');
            $table->integer('cr');
            $table->string('collected_by');
            $table->integer('upaid');
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
};
