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
        Schema::table('cuentas_por_cobrar', function (Blueprint $table) {
            $table->foreign(['codcli'], 'FK_Cuentas_por_cobrar_Clientes')->references(['codcli'])->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuentas_por_cobrar', function (Blueprint $table) {
            $table->dropForeign('FK_Cuentas_por_cobrar_Clientes');
        });
    }
};
