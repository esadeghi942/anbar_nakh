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
        Schema::create('string_qr_code_cell', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_qr_code_id')->unsigned();
            $table->foreign('string_qr_code_id')->references('id')->on('string_qr_codes')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('string_cell_id')->unsigned();
            $table->foreign('string_cell_id')->references('id')->on('string_cells')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enter_labels');
    }
};
