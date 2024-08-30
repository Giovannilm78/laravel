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
    Schema::create('productos', function (Blueprint $table) {
        $table->id('ProductoID');
        $table->string('Nombre', 100);
        $table->integer('PrecioUnitario');
        $table->integer('stock');
        $table->string('Descripcion', 100)->nullable();
        $table->unsignedBigInteger('CategoriaID'); // Asegúrate de incluir esta línea
        $table->timestamps();

        $table->foreign('CategoriaID')->references('id')->on('categorias')->onDelete('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
