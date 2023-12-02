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
        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('anbar_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('color');
            $table->foreign('anbar_id')->references('id')->on('anbars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cells');
    }
};
