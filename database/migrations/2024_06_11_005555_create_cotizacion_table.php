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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->integer('numcot', true);
            $table->integer('codcli')->index('FK_Cotizacion_Clientes');
            $table->integer('codusu');
            $table->string('condicion', 80);
            $table->double('subtot');
            $table->double('total');
            $table->timestamp('fecemis')->nullable()->useCurrent();
            $table->dateTime('fecvenc', 3);
            $table->string('observaciones', 300)->nullable();
            $table->string('estcot', 50);
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
        Schema::dropIfExists('cotizacion');
    }
};
