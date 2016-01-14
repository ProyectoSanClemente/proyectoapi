<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpresorasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('impresoras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_usuario');
			$table->string('modelo_impresora');
			$table->timestamps();
			$table->foreign('usuario_id')
      			->references('id')->on('usuarios')
      			->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('impresoras');
	}

}
