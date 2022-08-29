<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desparacitacions', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->date('fecha_desparacitacion');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->date('proxima_desparacitacion');
            $table->integer('id_mascota')->unsigned();
            $table->foreign('id_mascota')->references('id')->on('mascotas');
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
        Schema::dropIfExists('desparacitacions');
    }
};
