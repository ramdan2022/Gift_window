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
            $table->string('name')->unllable();
            $table->string('phone')->unllable();
            $table->string('email')->unllable();
            $table->string('address')->unllable();
            $table->string('product_title')->unllable();
            $table->string('Price')->unllable();
            $table->string('Quantity')->unllable();
            $table->string('Image')->unllable();
            $table->string('product_id')->unllable();
            $table->string('user_id')->unllable();
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
