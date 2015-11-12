<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todo_lists', function(Blueprint $table)
		{
			$table->increments('id');
			// $table->integer('user_id')->unsigned;
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			// $table->foreign('user_id')->references('id')->on('users');
			$table->string('name')->unique();
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
		Schema::drop('todo_lists');
	}

}
