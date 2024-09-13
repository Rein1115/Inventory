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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('supplier_name');
            $table->date('expiration_date');
            $table->decimal('original_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->string('status');
            $table->string('brand_name');
            $table->integer('quantity');
            $table->integer('originalquan');
            $table->integer('mg');
            $table->integer('created_by');
            $table->string('updated_by')->nullable();
            $table->integer('created_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
