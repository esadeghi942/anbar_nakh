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

            $table->bigInteger('string_group_id')->unsigned()->nullable();
            $table->foreign('string_group_id')->references('id')->on('string_groups')->onDelete('set null')->onUpdate('cascade');
            $table->float('weight')->default(0);
            $table->string('qr_code')->nullable();

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
