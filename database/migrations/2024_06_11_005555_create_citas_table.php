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
        Schema::create('citas', function (Blueprint $table) {
            $table->integer('codcit', true);
            $table->integer('codsol')->index('FK_cita_Solicitudes');
            $table->integer('codusu')->index('FK_citas_users');
            $table->dateTime('fecha', 3);
            $table->string('descrip', 300);
            $table->string('estcit', 50);
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
        Schema::dropIfExists('citas');
    }
};
