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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unique();
            $table->string('telephone');
            $table->string('order_type');
            $table->time('pickup_time')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
             $table->decimal('sub_total', 10, 2)->default(0);
             $table->decimal('discount', 10, 2)->default(0);
             $table->decimal('delivery', 10, 2)->default(0);
             $table->decimal('net_total', 10, 2)->default(0);
             $table->string('payment')->default('cash_on_delivery');
             $table->string('status', 10, 2)->default('pending');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
