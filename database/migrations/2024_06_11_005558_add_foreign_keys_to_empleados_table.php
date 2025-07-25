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
            $table->foreign(['codpos'], 'FK_Empleados_Posiciones_Empleados')->references(['codpos'])->on('posiciones_empleados');
            $table->foreign(['ctipemp'], 'FK_Empleados_Tipo_Empleados')->references(['ctipemp'])->on('tipo_empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('FK_Empleados_Posiciones_Empleados');
            $table->dropForeign('FK_Empleados_Tipo_Empleados');
        });
    }
};
