<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('is_free');
            $table->string('key_responsibilities', 100)->nullable();
            $table->string('team_size', 100)->nullable();
            $table->integer('founded_year')->nullable();
            $table->string('industries', 100)->nullable();
            $table->string('education_levels', 100)->nullable();
            $table->string('languages', 100)->nullable();
            $table->string('experience', 100)->nullable();
            $table->string('skills', 100)->nullable();
            $table->string('rate', 100)->nullable();
            $table->string('map_lat', 100)->nullable();
            $table->string('map_lng', 100)->nullable();
            $table->string('map_place_id', 100)->nullable();
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_free');
            $table->dropColumn('key_responsibilities');
            $table->dropColumn('team_size');
            $table->dropColumn('founded_year');
            $table->dropColumn('industries');
            $table->dropColumn('education_levels');
            $table->dropColumn('languages');
            $table->dropColumn('experience');
            $table->dropColumn('skills');
            $table->dropColumn('rate');
            $table->dropColumn('map_lat');
            $table->dropColumn('map_lng');
            $table->dropColumn('map_place_id');
        });
    }
}
