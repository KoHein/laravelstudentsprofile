<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersdataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('usersdata', function($table)
		{
			$table->increments('id');
			$table->text('photo', 255);
			$table->text('username', 255);
			$table->text('password', 255);
			$table->text('name', 255);
			$table->text('email', 255);
			$table->text('phone', 255);
			$table->text('address', 255);
			$table->text('fromadd', 255);
			$table->text('work', 255);
			$table->text('company', 255);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->integer('company' )->default(1);
			$table->text('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('usersdata');
	}

}
