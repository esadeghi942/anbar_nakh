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
        Schema::create('string_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_color_id')->unsigned();
            $table->bigInteger('string_material_id')->unsigned();
            $table->bigInteger('string_grade_id')->unsigned();
            $table->bigInteger('string_layer_id')->unsigned();

            $table->foreign('string_color_id')->references('id')->on('string_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('string_material_id')->references('id')->on('string_materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('string_grade_id')->references('id')->on('string_grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('string_layer_id')->references('id')->on('string_layers')->onDelete('cascade')->onUpdate('cascade');

            $table->float('order_pointer');
            $table->boolean('active')->default(1);

            $table->float('total_weight');

            $table->unique([
                'string_color_id',
                'string_material_id',
                'string_grade_id',
                'string_layer_id'
            ],'unique_color_material_grade_layer');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('string_types');
    }
};
