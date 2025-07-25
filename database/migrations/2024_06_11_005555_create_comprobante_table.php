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
        Schema::create('comprobante', function (Blueprint $table) {
            $table->integer('codcom', true);
            $table->string('nomemisor', 80);
            $table->decimal('rncemisor', 11, 0);
            $table->timestamp('fecemision')->nullable()->useCurrent();
            $table->decimal('rncliente', 11, 0);
            $table->string('nomcliente', 80);
            $table->dateTime('fecvenc', 3);
            $table->char('serie', 2);
            $table->integer('tipcompr');
            $table->decimal('secuencial', 10, 0);
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
        Schema::dropIfExists('comprobante');
    }
};
