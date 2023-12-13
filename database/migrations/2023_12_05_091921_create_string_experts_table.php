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
        Schema::create('string_exports', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('string_cell_id')->unsigned();
            $table->foreign('string_cell_id')->references('id')->on('string_cells')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('string_group_id')->unsigned()->nullable();
            $table->foreign('string_group_id')->references('id')->on('string_groups')->onDelete('set null')->onUpdate('cascade');

            $table->bigInteger('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade')->onUpdate('cascade');

            $table->float('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('string_experts');
    }
};
