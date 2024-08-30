<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [LoginController::class, 'loginInicio'])->name('login');
Route::get('login', [LoginController::class, 'loginInicio'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//midelware

Route::middleware('auth')->group(function (){
    Route::get('home', [InicioController::class, 'inicio'])->name('inicio');

    Route::controller(ProductoController::class)->group(function () {
        Route::get('productos', 'index')->name('productos.index');
        Route::get('productos/creando',  'crear')->name('productos.crear');
        Route::post('productos', 'store')->name('productos.store');
        Route::get('productos/{id}', 'show')->name('productos.show');
        Route::delete('productos/{ProductoID}', 'destroy')->name('productos.delete');
        Route::put('productos', 'update')->name('productos.edit');
    });
    
    Route::resource('categorias', CategoriaController::class);

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');

    Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [VentasController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');

    Route::controller(ClientesController::class)->group(function () {
        Route::get('cliente', 'index');
        Route::get('cliente/creando',  'crear');
        //Route::get('cliente/{datos}',  'verProducto');
    });
    Route::resource('productos', ProductoController::class);


   
});
    

// Route::get('productos', [ProductoController::class, 'index']);
// Route::get('productos/creando', [ProductoController::class, 'crear']);

// //paso de variables
// Route::get('productos/{datos}', [ProductoController::class, 'verProducto'] );


//clientes
Route::get('clientes', function () {
   return 'HOLA Clientes' ;
});

//rutas mas datos.


//paso de parametros con dos variables.
// Route::get('productos/{datos}/{cliente}', function($datos, $cliente){
//     return "producto $datos, $cliente";
// });
