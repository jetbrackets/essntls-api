<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->string('departure_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('items')->nullable();
            $table->decimal('shipping')->nullable();
            $table->decimal('commission')->nullable();
            $table->decimal('profit')->nullable();
            $table->string('status')->nullable();
            $table->time('accepted_in')->nullable();
            $table->time('arrival_in')->nullable();
            $table->time('delivery_time')->nullable();
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
}
