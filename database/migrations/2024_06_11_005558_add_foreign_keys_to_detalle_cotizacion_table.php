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
        Schema::table('detalle_cotizacion', function (Blueprint $table) {
            $table->foreign(['numcot'], 'detalle_cotizacion_ibfk_1')->references(['numcot'])->on('cotizacion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_cotizacion', function (Blueprint $table) {
            $table->dropForeign('detalle_cotizacion_ibfk_1');
        });
    }
};
