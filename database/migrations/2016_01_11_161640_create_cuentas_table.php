<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_id');
			$table->string('zimbra_id');
			$table->string('zimbra_pass');
			$table->string('nube_id');
			$table->string('nube_pass');
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
		Schema::drop('cuentas');
	}

}
