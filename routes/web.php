<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Persona_controller;
use App\Http\Controllers\Usuario_controller;
use App\Http\Controllers\Edificio_controller;
use App\Http\Controllers\Marca_controller;
use App\Http\Controllers\Modelo_controller;
use App\Http\Controllers\Dispositivo_controller;
use App\Http\Controllers\Red_controller;
use App\Http\Controllers\TipoRed_controller;
use App\Http\Controllers\TipoArea_controller;
use App\Http\Controllers\Area_controller;
use App\Http\Controllers\TipoDispositivo_controller;
use App\Http\Controllers\EncargadoDeArea_controller;
use App\Http\Controllers\Servicio_controller;
use App\Http\Controllers\Accion_controller;
use App\Http\Controllers\TipoServicio_controller;
use App\Http\Controllers\Solicitud_controller;

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

Route::get('/indexGod', function () {
    return view('inicioGod');
})->name('indexGod');

// Tipo de red --------------------------------------------------------------------------------------------------------------------
Route::get('/tipoRed', function () {
    return view('agregarVistaTipoRed');
});
Route::post('/tipoRed',[TipoRed_controller::class,"insertar"])->name('tipoRed.insertar');
Route::get('/tipoRed', [TipoRed_controller::class, 'mostrar'])->name('tipoRed.mostrar');
Route::match(['get', 'put'], '/bajaRed/{pkTipoRed}', [TipoRed_controller::class, 'baja'])->name('tipoRed.baja');
Route::put('/tipoRed/{pkTipoRed}', [TipoRed_controller::class, 'actualizar'])->name('tipoRed.actualizar');
Route::get('/tipoRedActualizar/{pkTipoRed}', [TipoRed_controller::class, 'mostrarPorId'])->name('tipoRed.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Tipo de servicio ---------------------------------------------------------------------------------------------------------------
Route::get('/tipoServicio', function () {
    return view('agregarVistaTipoServicio');
});
Route::post('/tipoServicio',[TipoServicio_controller::class,"insertar"])->name('tipoServicio.insertar');
Route::get('/tipoServicio', [TipoServicio_controller::class, 'mostrar'])->name('tipoServicio.mostrar');
Route::put('/tipoServicio/{pkTipoServicio}', [TipoServicio_controller::class, 'actualizar'])->name('tipoServicio.actualizar');
Route::get('/tipoServicioActualizar/{pkTipoServicio}', [TipoServicio_controller::class, 'mostrarPorId'])->name('tipoServicio.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Red ----------------------------------------------------------------------------------------------------------------------------
Route::get('/red', function () {
    return view('agregarRed');
})->name('agregarRed');
Route::post('/redes', function () {
    return view('vistaRedes');
})->name('redesRegistradas');
Route::post('/red', [Red_controller::class, 'insertar'])->name('red.insertar');
Route::get('/redes', [Red_controller::class, 'mostrar'])->name('red.mostrar');
Route::get('/obtener-nombre-tipo-red', [Red_controller::class, 'mostrarInputVlan'])->name('red.mostrarInputVlan');
Route::put('/redes/{pkRed}', [Red_controller::class, 'baja'])->name('red.baja');
Route::get('/actualizarRed/{pkRed}', [Red_controller::class, 'mostrarPorId'])
    ->name('Red.mostrarId');
Route::get('/red/mostrar/{pkRed}', [Red_controller::class, 'detalle'])->name('red.detalle');
Route::put('/red/{pkRed}', [Red_controller::class, 'actualizar'])->name('red.actualizar');
Route::get('/red/{pkRed}', [Red_controller::class, 'mostrarPorId'])->name('red.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Edificio -----------------------------------------------------------------------------------------------------------------------
Route::get('/Edificio', function () {
    return view('agregarYVistaEdificio');
});
Route::post('/Edificio',[Edificio_controller::class,"insertar"])->name('edificio.insertar');
Route::get('/Edificio', [Edificio_controller::class, 'mostrar'])->name('edificio.mostrar');
Route::put('/edificio/{pkEdificio}', [Edificio_controller::class, 'baja'])->name('edificio.baja');
Route::get('/actualizarEdificio/{pkEdificio}', [Edificio_controller::class, 'mostrarPorId'])->name('edificio.mostrarId');
Route::put('/actualizarEdificio/{pkEdificio}', [Edificio_controller::class, 'actualizar'])->name('edificio.actualizar');
// --------------------------------------------------------------------------------------------------------------------------------

// Usuario ------------------------------------------------------------------------------------------------------------------------
Route::get('/login1', function () {
    return view('login');
})->name('login1');
Route::get('/index', function () {
    return view('welcome');
});
Route::get('/registroDeUsuario', function () {
    return view('registrarUsuario');
});
Route::get('/Usuario', function () {
    return view('vistaUsuario');
});

Route::post('/AgregandoUsuario', [Usuario_controller::class, 'agregar'])->name('Usuario.agregar');
Route::post('/inicioSesion', [Usuario_controller::class, 'login'])->name('inicioSesion');
Route::get('/cerrarSesion', [Usuario_controller::class, 'logout'])->name('cerrarSesion');
// Route::get('/Usuario', [Usuario_controller::class, 'mostrarUsuariosGeneral'])->name('usuario.mostrar');
Route::get('/usuario/{pkUsuario}', [Usuario_controller::class, 'baja'])->name('usuario.baja');
Route::get('/actualizarUsuario/{pkUsuario}', [Usuario_controller::class, 'mostrarUsuarioPorId'])->name('usuario.mostrarId');
Route::put('/actualizarUsuario/{pkUsuario}', [Usuario_controller::class, 'actualizar'])->name('usuario.actualizar');
Route::post('/registroPersona', [Persona_controller::class,"insertar"])->name('persona.insertar');
Route::get('/listadoPersona',[Persona_controller::class,"mostrar"]);
// Route::get('/Usuario',[Usuario_controller::class, 'buscarUsuarios'])->name('buscarUsuarios');
Route::get('/UsuarioBusqueda',[Usuario_controller::class, 'buscarUsuarios'])->name('buscarUsuarios');
// --------------------------------------------------------------------------------------------------------------------------------

// Marca --------------------------------------------------------------------------------------------------------------------------
Route::get('/marca', function () {
    return view('agregarVistaMarca');
})->name('marca');
Route::get('/marcas', function () {
    return view('agregarVistaMarca');
})->name('marca');
Route::post('/marca', [Marca_controller::class, 'insertar'])->name('marca.insertar');
Route::get('/marca', [Marca_controller::class, 'mostrar'])->name('marca.mostrar');
Route::get('/bajaMarca/{pkMarca}', [Marca_controller::class, 'baja'])->name('marca.baja');
Route::put('/marca/{pkMarca}/update', [Marca_controller::class, 'editar'])->name('marca.editar');
Route::get('/marca/{pkMarca}/update', [Marca_controller::class, 'actualizado'])->name('marca.actualizado');
// --------------------------------------------------------------------------------------------------------------------------------

// Modelo -------------------------------------------------------------------------------------------------------------------------
Route::get('/modelo', function () {
    return view('agregarVistaModelo');
})->name('agregarModelo');
Route::post('/modelo', function () {
    return view('agregarVistaModelo');
})->name('modelosRegistrados');
Route::post('/modelo', [Modelo_controller::class, 'insertar'])->name('modelo.insertar');
Route::get('/modelo', [Modelo_controller::class, 'mostrar'])->name('modelo.mostrar');
Route::get('/bajaModelo/{pkModelo}', [Modelo_controller::class, 'baja'])->name('modelo.baja');
Route::put('/modelo/{pkModelo}/update', [Modelo_controller::class, 'editar'])->name('modelo.editar');
Route::get('/modelo/{pkModelo}/update', [Modelo_controller::class, 'actualizado'])->name('modelo.actualizado');
// --------------------------------------------------------------------------------------------------------------------------------

// Tipo de dispositivo ------------------------------------------------------------------------------------------------------------
Route::get('/tipoDispositivo', function () {
    return view('agregarVistaTipoDispositivo');
})->name('agregarTipoDispositivo');
Route::post('/tipoDispositivo', function () {
    return view('agregarVistaTipoDispositivo');
})->name('tiposDispositivoRegistrados');
Route::post('/tipoDispositivo', [TipoDispositivo_controller::class, 'insertar'])->name('tipoDispositivo.insertar');
Route::get('/tipoDispositivo', [TipoDispositivo_controller::class, 'mostrar'])->name('tipoDispositivo.mostrar');
Route::get('/bajaTipoDispositivo/{pkTipoDispositivo}', [TipoDispositivo_controller::class, 'baja'])->name('tipoDispositivo.baja');
Route::put('/tipoDispositivo/{pkTipoDispositivo}/update', [TipoDispositivo_controller::class, 'actualizar'])->name('tipoDispositivo.actualizar');
Route::get('/tipoDispositivo/{pkTipoDispositivo}/update', [TipoDispositivo_controller::class, 'mostrarPorId'])->name('tipoDispositivo.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Dispositivo --------------------------------------------------------------------------------------------------------------------
Route::get('/Dispositivo', function () {
    return view('agregarDispositivo');
})->name('agregarDispositivo');
Route::match(['get', 'put'], '/dispositivo', function () {
    return view('vistaDispositivo');
})->name('dispositivosRegistrados');
Route::match(['get', 'put'], '/dispositivo', function () {
    return view('vistaDispositivo');
})->name('dispositivosFiltro');
Route::post('/Dispositivo',[Dispositivo_controller::class,"insertar"])->name('dispositivo.insertar');
Route::get('/dispositivo', [Dispositivo_controller::class, 'mostrar'])->name('dispositivo.mostrar');
Route::get('/dispositivoDetalle/mostrar/{pkDispositivo}', [Dispositivo_controller::class, 'detalle'])->name('dispositivo.detalle');
Route::get('/bajaDispositivo/{pkDispositivo}', [Dispositivo_controller::class, 'baja'])->name('dispositivo.baja');
Route::put('/dispositivo/{pkDispositivo}/update', [Dispositivo_controller::class, 'editar'])->name('dispositivo.editar');
Route::get('/dispositivo/{pkDispositivo}/update', [Dispositivo_controller::class, 'actualizado'])->name('dispositivo.actualizado');
// --------------------------------------------------------------------------------------------------------------------------------

// Área ---------------------------------------------------------------------------------------------------------------------------
Route::get('/area', function () {
    return view('agregarArea');
})->name('area');
Route::post('/verArea', function () {
    return view('areaVista');
})->name('verArea');
Route::post('/area', [Area_controller::class, 'insertar'])->name('area.insertar');
Route::get('/verArea', [Area_controller::class, 'mostrar'])->name('area.mostrar');
Route::get('/bajaArea/{pkArea}', [Area_controller::class, 'baja'])->name('area.baja');
Route::put('/area/{pkArea}', [Area_controller::class, 'editar'])->name('area.editar');
Route::get('/area/{pkArea}', [Area_controller::class, 'actualizado'])->name('area.actualizado');
// --------------------------------------------------------------------------------------------------------------------------------

// Tipo de área -------------------------------------------------------------------------------------------------------------------
Route::post('/tipoArea',[TipoArea_controller::class,"insertar"])->name('tipoArea.insertar');
Route::get('/tipoArea', [TipoArea_controller::class, 'mostrar'])->name('tipoArea.mostrar');
Route::match(['get', 'put'], '/bajaTipoArea/{pkTipoArea}', [TipoArea_controller::class, 'baja'])->name('tipoArea.baja');
Route::put('/tipoArea/{pkTipoArea}', [TipoArea_controller::class, 'actualizar'])->name('tipoArea.actualizar');
Route::get('/tipoAreaActualizar/{pkTipoArea}', [TipoArea_controller::class, 'mostrarPorId'])->name('tipoArea.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Encargado de área --------------------------------------------------------------------------------------------------------------
Route::get('/encargadoDeArea', function () {
    return view('agregarVistaEncargadoDeArea');
})->name('agregarEncargadoDeArea');
Route::post('/encargadoDeArea', function () {
    return view('agregarVistaEncargadoDeArea');
})->name('encargadosDeAreaRegistrados');
Route::post('/encargadoDeArea', [EncargadoDeArea_controller::class, 'insertar'])->name('encargadoDeArea.insertar');
Route::get('/encargadoDeArea', [EncargadoDeArea_controller::class, 'mostrar'])->name('encargadoDeArea.mostrar');
Route::get('/bajaEncargadoDeArea/{pkEncargadoDeArea}', [EncargadoDeArea_controller::class, 'baja'])->name('encargadoDeArea.baja');
Route::put('/encargadoDeArea/{pkEncargadoDeArea}/update', [EncargadoDeArea_controller::class, 'actualizar'])->name('encargadoDeArea.actualizar');
Route::get('/encargadoDeArea/{pkEncargadoDeArea}/update', [EncargadoDeArea_controller::class, 'mostrarPorId'])->name('encargadoDeArea.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Acción -------------------------------------------------------------------------------------------------------------------------
Route::post('/accion',[Accion_controller::class,"insertar"])->name('accion.insertar');
Route::get('/accion', [Accion_controller::class, 'mostrar'])->name('accion.mostrar');
Route::put('/accion/{pkAccion}', [Accion_controller::class, 'actualizar'])->name('accion.actualizar');
Route::get('/accionActualizar/{pkAccion}', [Accion_controller::class, 'mostrarPorId'])->name('accion.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Servicio -----------------------------------------------------------------------------------------------------------------------
Route::get('/servicio', function () {
    return view('agregarServicios');
})->name('servicio');
Route::post('/verServicios', function () {
    return view('vistaDeServicios');
})->name('verServicios');
Route::get('/servicioDetalle/mostrar/{pkServicio}', [Servicio_controller::class, 'mostrarDetalle'])->name('servicio.detalle');
Route::post('/servicio', [Servicio_controller::class, 'insertar'])->name('servicio.insertar');
Route::get('/verServicios', [Servicio_controller::class, 'mostrar'])->name('servicio.mostrar');
Route::put('/servicio/{pkServicio}', [Servicio_controller::class, 'actualizar'])->name('servicio.actualizar');
Route::get('/servicio/{pkServicio}', [Servicio_controller::class, 'mostrarPorId'])->name('servicio.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

// Solicitud ----------------------------------------------------------------------------------------------------------------------
Route::get('/solicitud', function () {
    return view('agregarSolicitud');
})->name('solicitud');
Route::post('/verSolicitudes', function () {
    return view('vistaDeSolicitudes');
})->name('verSolicitudes');
Route::post('/solicitud', [Solicitud_controller::class, 'insertar'])->name('solicitud.insertar');
Route::get('/verSolicitudes', [Solicitud_controller::class, 'mostrar'])->name('solicitud.mostrar');
Route::get('/solicitudDetalle/mostrar/{pkSolicitud}', [Solicitud_controller::class, 'detalle'])->name('solicitud.detalle');
Route::put('/solicitud/{pkSolicitud}', [Solicitud_controller::class, 'actualizar'])->name('solicitud.actualizar');
Route::get('/solicitud/{pkSolicitud}', [Solicitud_controller::class, 'mostrarPorId'])->name('solicitud.mostrarPorId');
// --------------------------------------------------------------------------------------------------------------------------------

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
