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
        Schema::create('string_layers',function (Blueprint $table){
            $table->id();
            $table->integer('value');
            $table->timestamps();
        });

        Schema::table('string_groups',function (Blueprint $table){
            $table->bigInteger('string_layer_id')->unsigned()->after('string_grade_id')->nullable();
            $table->foreign('string_layer_id')->references('id')->on('string_layers')->onDelete('set null')->onUpdate('cascade');
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
