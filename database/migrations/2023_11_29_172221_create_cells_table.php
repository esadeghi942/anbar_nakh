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
        Schema::create('string_cells', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->bigInteger('string_anbar_id')->unsigned();
            $table->foreign('string_anbar_id')->references('id')->on('string_anbars')->onDelete('cascade')->onUpdate('cascade');
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
