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
        Schema::create('cuentas_por_cobrar', function (Blueprint $table) {
            $table->integer('codcue', true);
            $table->integer('codcli')->index('FK_Cuentas_por_cobrar_Clientes');
            $table->double('balance');
            $table->double('totpag')->nullable()->default(0);
            $table->double('balpend');
            $table->string('estcue', 50);
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
        Schema::dropIfExists('cuentas_por_cobrar');
    }
};
