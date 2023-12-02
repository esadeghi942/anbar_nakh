<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->string('qr_codes');
            $table->string('status');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('cell_id')->unsigned();
            $table->foreign('cell_id')->references('id')->on('cells')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('anbar_id')->unsigned();
            $table->foreign('anbar_id')->references('id')->on('anbars')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
