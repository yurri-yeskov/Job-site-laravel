<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function (Blueprint $table) {
			$table->string('id', 11)->default('');
			$table->text('payload')->nullable();
			$table->integer('last_activity')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('ip_address', 250)->default('');
			$table->text('user_agent');
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sessions');
	}
}
