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
        Schema::table('empleados', function (Blueprint $table) {
            $table->integer('id_sucursal')->unsigned();
            $table->foreign('id_sucursal')->references('id')->on('sucursals');
        });
        DB::table("empleados")
        ->insert([
            "nombre" => "Admin",
            "apellido" => "Admin",
            "celular" => "0000-0000",
            "dui" => "00000000-0",
            "cargo" => "administrador",
            "id_sucursal"=>"1",
            //password por default del 1 al 6
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleados_sucursal_id_foreign');
        });
    }
};
