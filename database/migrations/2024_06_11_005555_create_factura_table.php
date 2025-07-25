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
        Schema::create('factura', function (Blueprint $table) {
            $table->integer('numfac', true);
            $table->integer('codcli')->index('FK_Factura_Clientes');
            $table->bigInteger('codusu');
            $table->string('condicion', 100);
            $table->double('subtot');
            $table->double('total');
            $table->string('form_pag', 50);
            $table->integer('codcom')->nullable();
            $table->timestamp('fecemis')->nullable()->useCurrent();
            $table->dateTime('fecvenc', 3);
            $table->string('observaciones', 300)->nullable();
            $table->string('estfac', 50);
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
        Schema::dropIfExists('factura');
    }
};
