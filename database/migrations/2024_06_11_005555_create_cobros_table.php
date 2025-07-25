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
        Schema::create('cobros', function (Blueprint $table) {
            $table->integer('codcob', true);
            $table->integer('codcue')->index('FK_Pago_Cuentas_por_cobrar');
            $table->integer('numfac');
            $table->string('form_pag', 60);
            $table->string('cuenta_empresa', 100)->nullable();
            $table->string('cuenta_cliente', 100)->nullable();
            $table->string('banco', 100)->nullable();
            $table->timestamp('fecemi')->nullable()->useCurrent();
            $table->double('montpag');
            $table->double('cobrado');
            $table->double('devuelta');
            $table->string('comentario', 300)->nullable();
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
        Schema::dropIfExists('cobros');
    }
};
