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
        Schema::create('string_group_qr_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_group_id')->unsigned();
            $table->foreign('string_group_id','string_group')->references('id')->on('string_groups')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('set null')->onUpdate('cascade');

            $table->integer('count');
            $table->string('lat')->default('وارد نشده')->nullable();
            $table->timestamps();
        });

        Schema::create('string_qr_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('string_group_qr_code_id')->unsigned();
            $table->foreign('string_group_qr_code_id','string_group_qr_codes')->references('id')->on('string_group_qr_codes')->onDelete('cascade')->onUpdate('cascade');

            $table->string('serial');
            $table->float('weight')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_gr_codes');
    }
};
