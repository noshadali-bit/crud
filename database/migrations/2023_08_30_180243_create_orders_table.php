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

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->text('note')->nullable();
            $table->string('order_amount');
            $table->string('order_response')->nullable();
            $table->integer('pay_status')->default(0);

            $table->integer('is_active')->default(0);
            $table->integer('is_delete')->default(0);
            
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
