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
            $table->string('accountname');
            $table->string('modelo_impresora');
            $table->timestamps();
            $table->unique(array('accountname', 'modelo_impresora'));
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
