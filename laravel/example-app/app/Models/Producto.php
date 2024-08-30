<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductoID'; 
    protected $fillable = ["ProductoID", "Nombre", "PrecioUnitario", "stock", "Descripcion","CategoriaID"];
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'ProductoID');
        
    }
    // app/Models/Producto.php
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'CategoriaID');
    }

}