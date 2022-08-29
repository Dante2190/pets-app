<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\DesparacitacionController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register' => false]);
Route::group(['middleware'=>'auth'], function(){
    Route::resource('configuracion',ConfiguracionController::class);
    Route::resource('cliente',ClienteController::class);
    Route::resource('producto',ProductoController::class);
    Route::resource('empleado',EmpleadoController::class);
    Route::resource('mascota',MascotaController::class);
    Route::resource('vacuna',VacunaController::class);
    Route::resource('sucursal',SucursalController::class);
    Route::resource('desparacitacion',DesparacitacionController::class);
    Route::resource('consulta',ConsultaController::class);
    Route::resource('usuario',UsuarioController::class);
    Route::get('/password', [App\Http\Controllers\UsuarioController::class, 'password'])->name('password');
    Route::put('/usu/{id}',  [UsuarioController::class, 'update_profile']);
    Route::put('/pass/{id}',  [UsuarioController::class, 'changePasswordPost']);
    Route::post('/changePassword', [App\Http\Controllers\UsuarioController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('/nueva_consulta/{id}',[ConsultaController::class, 'nueva_consulta']);
    Route::get('/nueva_vacuna/{id}',[VacunaController::class, 'nueva_vacuna']);
    Route::get('/nueva_desparacitacion/{id}',[DesparacitacionController::class, 'nueva_desparacitacion']);
    Route::get('nueva/{id}',[MascotaController::class, 'nueva']);
    Route::post('/send-email', [ContactController::class,'sendEmail'])->name('send.email');
});
Route::get('/pdf', function () {
    return view('pdf.pdfCliente');
});
Route::get('reporteM/{id}',[PostController::class, 'consultaPDF']);
Route::get('reporte/{id}',[PostController::class, 'downloadCPDF']);
Route::get('downloadP-pdf', [PostController::class, 'downloadProdPDF']);
Route::get('download-pdf', [PostController::class, 'downloadPDF']);
//Route::post('/send-email', [ContactController::class,'sendEmail'])->name('send.email');//
