<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('trans_no');
            $table->integer('product_id');
            $table->string('deliveredto');
            $table->string('address');
            $table->string('delivered_date');

            $table->integer('quantity');
            $table->integer('total_amount');
            $table->integer('po_no');
            $table->integer('terms');

            $table->string('deliveredby');
            $table->string('fullname');
            $table->string('contact_num');
            $table->integer('or');
            $table->integer('cr');
            $table->string('collected_by');
            $table->string('payment_status');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->integer('created_id');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
