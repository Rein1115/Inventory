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
        Schema::create('freebies', function (Blueprint $table) {
            $table->id();
            $table->integer('trans_No');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('created_by');
            $table->integer('Amount')->default(0);
            $table->integer('created_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freebies');
    }
};
