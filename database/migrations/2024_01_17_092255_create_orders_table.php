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
        Schema::create('carpet_factors', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->timestamps();
        });

        Schema::create('carpet_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carpet_factor_id')->unsigned();
            $table->string('number');
            $table->string('date');
            $table->bigInteger('carpet_weaver_id')->unsigned()->nullable();
            $table->bigInteger('carpet_size_id')->unsigned()->nullable();
            $table->bigInteger('carpet_map_id')->unsigned()->nullable();
            $table->bigInteger('carpet_color_id')->unsigned()->nullable();

            $table->integer('number_carpet_board');
            $table->integer('number_roll_sleepy_on');
            $table->integer('weight_roll_sleepy_on');

            $table->integer('number_roll_sleepy_below');
            $table->integer('weight_roll_sleepy_below');

            $table->foreign('carpet_factor_id')->references('id')->on('carpet_factors')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('carpet_weaver_id')->references('id')->on('carpet_weavers')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('carpet_color_id')->references('id')->on('carpet_colors')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('carpet_map_id')->references('id')->on('carpet_maps')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('carpet_size_id')->references('id')->on('carpet_sizes')->onDelete('set null')->onUpdate('cascade');

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
