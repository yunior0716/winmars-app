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
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('codcli', true);
            $table->string('nomcli', 60);
            $table->string('apecli', 60)->nullable();
            $table->decimal('tecli1', 14, 0)->unique('tecli1');
            $table->decimal('tecli2', 14, 0)->nullable();
            $table->string('dircli', 300);
            $table->string('corcli', 80)->unique('corcli');
            $table->string('cedrnc', 14)->unique('cedrnc');
            $table->integer('codtpcli')->index('FK_Clientes_Tipo_Clientes');
            $table->string('estcli', 50);
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
        Schema::dropIfExists('clientes');
    }
};
