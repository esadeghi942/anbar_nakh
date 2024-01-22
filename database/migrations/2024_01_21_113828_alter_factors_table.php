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
        Schema::table('carpet_factors', function (Blueprint $table) {
            $table->bigInteger('carpet_company_id')->unsigned()->nullable()->after('number');
            $table->bigInteger('carpet_device_id')->unsigned()->nullable()->after('number');

            $table->foreign('carpet_company_id')->references('id')->on('carpet_companies')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('carpet_device_id')->references('id')->on('carpet_devices')->onDelete('set null')->onUpdate('cascade');
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
