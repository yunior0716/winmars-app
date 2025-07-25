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
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('codemp', true);
            $table->string('nomemp', 60);
            $table->string('apeemp', 60);
            $table->decimal('telem1', 14, 0)->unique('telem1');
            $table->decimal('telem2', 14, 0)->nullable();
            $table->string('direccion', 300);
            $table->string('correo', 80)->unique('correo');
            $table->string('cedula', 14)->unique('cedula');
            $table->integer('ctipemp')->index('FK_Empleados_Tipo_Empleados');
            $table->integer('codpos')->index('FK_Empleados_Posiciones_Empleados');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('estemp', 100);
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
        Schema::dropIfExists('empleados');
    }
};
