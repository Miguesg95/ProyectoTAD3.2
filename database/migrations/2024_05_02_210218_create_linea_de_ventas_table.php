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
        Schema::create('linea_de_ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("cantidad");
            $table->double("importeParcial");
            $table->foreignId('venta_id')->nullable()->constrained();
            $table->foreignId('calzado_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_de_ventas');
    }
};
