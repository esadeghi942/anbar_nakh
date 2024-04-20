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

        Schema::drop('carpet_orders');
        Schema::drop('carpet_factors');
        Schema::rename('carpet_sizes', 'roll_sizes');
        Schema::table('roll_sizes', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('carpet_weavers', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('carpet_colors', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('carpet_devices', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('carpet_maps', function (Blueprint $table) {
            $table->string('image')->after('name')->nullable();
            $table->softDeletes();
        });

        Schema::create('roll_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('roll_factors', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('carpet_device_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('carpet_device_id')->references('id')->on('carpet_devices');
            $table->timestamps();
        });

        Schema::create('roll_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roll_factor_id')->unsigned();
            $table->string('number');
            $table->string('date');
            $table->bigInteger('carpet_weaver_id')->unsigned()->nullable();
            $table->bigInteger('roll_size_id')->unsigned()->nullable();
            $table->bigInteger('carpet_map_id')->unsigned()->nullable();
            $table->bigInteger('roll_color_id')->unsigned()->nullable();

            $table->integer('number_carpet_board');
            $table->integer('number_roll_sleepy_on');
            $table->integer('weight_roll_sleepy_on');

            $table->integer('number_roll_sleepy_below');
            $table->integer('weight_roll_sleepy_below');

            $table->foreign('roll_factor_id')->references('id')->on('roll_factors')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('carpet_weaver_id')->references('id')->on('carpet_weavers');
            $table->foreign('roll_color_id')->references('id')->on('roll_colors');
            $table->foreign('carpet_map_id')->references('id')->on('carpet_maps');
            $table->foreign('roll_size_id')->references('id')->on('roll_sizes');

            $table->timestamps();
        });

        Schema::create('carpet_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('carpet_map_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('carpet_map_id')->references('id')->on('carpet_maps')->onDelete('cascade');
            $table->string('time_limit', 20);
            $table->text('carpet_product_feature');
            $table->timestamps();
        });

        Schema::create('carpet_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carpet_order_id');
            $table->foreign('carpet_order_id')->references('id')->on('carpet_orders')->onDelete('cascade');
            $table->string('shape', 20);
            $table->integer('row');
            $table->float('size1')->nullable();
            $table->float('size2')->nullable();
            $table->integer('count')->default(0);
            $table->float('area')->nullable();
            $table->timestamps();
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
