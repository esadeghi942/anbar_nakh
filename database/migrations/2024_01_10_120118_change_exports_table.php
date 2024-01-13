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
        Schema::table('string_exports',function (Blueprint $table){
            $table->string('serial');
            $table->dropForeign(['string_qr_code_id']);
            $table->dropColumn('string_qr_code_id');
            $table->bigInteger('string_group_qr_code_id')->unsigned();
            $table->foreign('string_group_qr_code_id')->references('id')->on('string_group_qr_codes')->onDelete('cascade')->onUpdate('cascade');
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
