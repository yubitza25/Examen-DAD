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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();  // Clave primaria
            $table->string('nombre', 255);  // Nombre del evento
            $table->text('descripcion');  // Descripción del evento
            $table->dateTime('fecha_inicio');  // Fecha de inicio del evento
            $table->dateTime('fecha_fin');  // Fecha de fin del evento
            $table->decimal('costo', 10, 2);  // Costo del evento
            $table->timestamps();  // Campos created_at y updated_at automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
