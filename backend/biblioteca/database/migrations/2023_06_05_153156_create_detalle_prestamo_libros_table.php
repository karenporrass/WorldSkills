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
        Schema::create('detalle_prestamo_libros', function (Blueprint $table) {
            $table->id('id');
            $table->dateTime('fechaDevolucion')->nullable();
            $table->foreignId('libro_id')-> constrained( table: 'libros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('prestamo_id')-> constrained (table: 'prestamo_libros')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_prestamo_libros');
    }
};
