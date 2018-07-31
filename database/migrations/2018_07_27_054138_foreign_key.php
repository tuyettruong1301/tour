<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces')->change();
        });

        Schema::table('road_places', function (Blueprint $table) {
            $table->foreign('place_id')->references('id')->on('places')->change();
        });

        Schema::table('road_places', function (Blueprint $table) {
            $table->foreign('road_id')->references('id')->on('roads')->change();
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->foreign('road_id')->references('id')->on('roads')->change();
            $table->foreign('type_id')->references('id')->on('types')->change();
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types')->change();
            $table->foreign('place_id')->references('id')->on('places')->change();
        });

        Schema::table('tour_hotels', function (Blueprint $table) {
            $table->foreign('tour_id')->references('id')->on('tours')->change();
            $table->foreign('hotel_id')->references('id')->on('hotels')->change();
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('tour_id')->references('id') ->on('tours')->change();
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('tour_id')->references('id')->on('tours')->change();
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
                $table->foreign('tour_id')->references('id')->on('tours')->change();
        });

        Schema::table('departions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('tour_id')->references('id')->on('tours')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
