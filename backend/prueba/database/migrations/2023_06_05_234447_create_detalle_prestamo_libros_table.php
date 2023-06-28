<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_prestamo_libros', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('prestamoId')->constraint(table: 'prestamo_libros')->onDelete('cascade');
            $table->foreignId('libroId')->constraint(table: 'libros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_prestamo_libros');
    }
};
