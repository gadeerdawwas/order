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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('Shipping_type')->nullable();
            $table->text('description')->nullable();
            $table->string('number')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('price_Shipping')->nullable();
            $table->string('state')->default(0);
            $table->foreignId('order_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
