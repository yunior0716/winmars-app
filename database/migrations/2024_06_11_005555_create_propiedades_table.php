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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->integer('codpro', true);
            $table->string('titulo', 80);
            $table->longText('descrip');
            $table->integer('habit');
            $table->integer('baños');
            $table->double('metros');
            $table->integer('parqueo');
            $table->double('preven')->nullable()->default(0);
            $table->double('preren')->nullable()->default(0);
            $table->double('comision');
            $table->integer('codcli');
            $table->integer('codtpro');
            $table->integer('citbis');
            $table->string('estpro', 100);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades');
    }
};
