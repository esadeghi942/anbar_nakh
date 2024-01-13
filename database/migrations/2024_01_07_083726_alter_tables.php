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
        Schema::drop('string_enters');

        Schema::table('string_exports',function (Blueprint $table){
            $table->dropForeign(['string_cell_id']);
            $table->dropColumn('string_cell_id');
            $table->bigInteger('string_qr_code_id')->unsigned();
            $table->foreign('string_qr_code_id')->references('id')->on('string_qr_codes')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('string_group_qr_codes',function (Blueprint $table){
            $table->string('type',20);
        });

        Schema::table('string_cells',function (Blueprint $table){
            $table->dropColumn('qr_code');
            $table->dropColumn('weight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
