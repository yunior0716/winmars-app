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
        Schema::create('datos_empresa', function (Blueprint $table) {
            $table->string('nombre', 100);
            $table->string('razon_social', 100);
            $table->decimal('rnc', 14, 0);
            $table->string('direccion');
            $table->decimal('telefono1', 14, 0);
            $table->decimal('telefono2', 14, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_empresa');
    }
};
