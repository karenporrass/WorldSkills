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
        Schema::create('detalle_prestamo_equipos', function (Blueprint $table) {
            $table->id('id');
            $table->date('fechaDevolucion');
            $table->foreignId('prestamo_id')-> constrained(table: 'prestamo_equipos');
            $table->foreignId('equipo_id')-> constrained(table: 'equipos');
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
        Schema::dropIfExists('detalle_prestamo_equipos');
    }
};
