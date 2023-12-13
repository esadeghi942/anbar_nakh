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
        Schema::create('string_enters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_anbar_id')->unsigned();
            $table->foreign('string_anbar_id')->references('id')->on('string_anbars')->onDelete('cascade')->onUpdate('cascade');


            $table->bigInteger('string_cell_id')->unsigned();
            $table->foreign('string_cell_id')->references('id')->on('string_cells')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('string_group_id')->unsigned()->nullable();
            $table->foreign('string_group_id')->references('id')->on('string_groups')->onDelete('set null')->onUpdate('cascade');

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
