<?php

namespace Database\Seeders;
use App\Models\Categoria;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::insert([
            ['nombre' => 'Tecnología', 'descripcion' => 'Artículos relacionados con la tecnología.'],
            ['nombre' => 'Hogar', 'descripcion' => 'Productos para el hogar y la decoración.'],
            ['nombre' => 'Deportes', 'descripcion' => 'Equipos y accesorios deportivos.'],
            ['nombre' => 'Moda', 'descripcion' => 'Ropa y accesorios de moda.'],
            ['nombre' => 'Alimentos', 'descripcion' => 'Productos alimenticios y bebidas.'],
        ]);
    }
}
