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
        Schema::create('carpet_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carpet_order_id');
            $table->foreign('carpet_order_id')->references('id')->on('carpet_orders')->onDelete('cascade');
            $table->string('shape',20);
            $table->integer('size1')->nullable();
            $table->integer('size2')->nullable();
            $table->integer('number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carpet_products');
    }
};
