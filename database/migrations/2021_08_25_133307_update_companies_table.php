<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companies', function (Blueprint $table) {
            $table->string('team_size',100)->nullable();
            $table->string('industries',100)->nullable();
            $table->string('founded_year',100)->nullable();
            $table->string('map_lat',100)->nullable();
            $table->string('map_lng',100)->nullable();
            $table->string('map_place_id',100)->nullable();
            $table->string('specialities',100)->nullable();
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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('team_size');
            $table->dropColumn('industries');
            $table->dropColumn('founded_year');
            $table->dropColumn('map_lat');
            $table->dropColumn('map_lng');
            $table->dropColumn('map_place_id');
            $table->dropColumn('specialities');
        });
    }
}
