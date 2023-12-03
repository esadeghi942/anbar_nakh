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
        Schema::create('string_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_anbar_id')->unsigned();
            $table->foreign('string_anbar_id')->references('id')->on('id')->on('string_anbars')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('string_cell_id')->unsigned();
            $table->foreign('string_cell_id')->references('id')->on('string_cells')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('string_material_id')->unsigned()->nullable();
            $table->foreign('string_material_id')->references('id')->on('string_materials')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('string_color_id')->unsigned()->nullable();
            $table->foreign('string_color_id')->references('id')->on('string_colors')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('string_grade_id')->unsigned()->nullable();
            $table->foreign('string_grade_id')->references('id')->on('string_grades')->onDelete('set null')->onUpdate('cascade');
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('set null')->onUpdate('cascade');
            $table->float('weight');
            $table->string('type');
            $table->string('qr_code');
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
