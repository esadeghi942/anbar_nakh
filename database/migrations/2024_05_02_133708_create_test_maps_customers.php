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
        Schema::create('test_maps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('test_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_maps_customers');
    }
};
