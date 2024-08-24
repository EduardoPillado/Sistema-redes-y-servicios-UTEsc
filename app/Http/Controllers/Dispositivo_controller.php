<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\FotoDispositivo;

class Dispositivo_controller extends Controller
{
    
   public function insertar(Request $req){

        $dispositivo= new Dispositivo();
        $foto= new FotoDispositivo();
        $dispositivo->nombre=$req->nombre;
        $dispositivo->serie=$req->serie;
        $dispositivo->fkEdificio=$req->fkEdificio;
        $dispositivo->fkModelo=$req->fkModelo;
        $dispositivo->fkMarca=$req->fkMarca;
        $dispositivo->cantidadPuertos=$req->cantidadPuertos;
        $dispositivo->fkTipoDispositivo=$req->fkTipoDispositivo;
        $dispositivo->estatus=1;
        $dispositivo->save();
        
        if ($req->hasFile('fotito')) {
            $imagenes = $req->file('fotito');

            foreach ($imagenes as $imagen) {
                // Guarda cada imagen en el sistema de archivos
                $path = $imagen->store('unploads', 'public');

                // Obtiene el nombre del archivo almacenado (sin la ruta completa)
                // $nombreArchivo = basename($path);

                // Guarda la información de la imagen en la base de datos
                $foto = new FotoDispositivo();
                $foto->nombreFoto = $path;
                $foto->fkDispositivo = $dispositivo->pkDispositivo;
                $foto->save();
            }

            if ($dispositivo->pkDispositivo) {
                return redirect('/dispositivo')->with('success', 'Guardado');
            } else {
                return redirect('/dispositivo')->with('error', 'Hay algún problema con la información');
            }
        }
    }
    public function mostrar(){
        $datosDispositivo=Dispositivo::join('edificio', 'dispositivo.fkEdificio', '=', 'edificio.pkEdificio')
        ->join('marca', 'dispositivo.fkMarca', '=', 'marca.pkMarca')
        ->join('modelo', 'dispositivo.fkModelo', '=', 'modelo.pkModelo')
        ->join('tipoDispositivo', 'dispositivo.fkTipoDispositivo', '=', 'tipoDispositivo.pkTipoDispositivo')
        ->select('dispositivo.*', 'edificio.estatus as edificioEstatus', 'marca.estatus as marcaEstatus', 'modelo.estatus as modeloEstatus')
        ->with('edificio', 'marca', 'modelo', 'tipoDispositivo')
        ->where('dispositivo.estatus', '=', 1)
        ->get();
        return view('vistaDispositivo', compact('datosDispositivo'));
    }

    public function detalle($pkDispositivo){
        $datosDispositivo = Dispositivo::with('fotos')
        ->where('dispositivo.pkDispositivo', $pkDispositivo)
        ->first();
    
        if ($datosDispositivo) {
            $fotoRuta = asset("storage/{$datosDispositivo->fotos->first()->nombreFoto}");
            return view('detalleDispositivo')->with(['datosDispositivo' => $datosDispositivo, 'fotoRuta' => $fotoRuta]);
        } else {
            return redirect()->route('dispositivosRegistrados')->with('message', 'El registro no existe.');
        }
    }

    public function baja($pkDispositivo){
        $dato = Dispositivo::findOrFail($pkDispositivo);
        
        if ($dato) {
            $dato->estatus = 0;
            $dato->save();

            return redirect('/dispositivo')->with('success', 'Dispositivo dado de baja');
        } else {
            return redirect('/dispositivo')->with('error', 'Hay algún problema con la información');
        }
    }
    public function filtrar(Request $request)
{
    $filtroEdificio = $request->input('filtroEdificio');
    $filtroModelo = $request->input('filtroModelo');
    $filtroMarca = $request->input('filtroMarca');

    // Consulta base para obtener dispositivo activos
    $query = Dispositivo::join('edificio', 'dispositivo.fkEdificio', '=', 'edificio.pkEdificio')
        ->join('marca', 'dispositivo.fkMarca', '=', 'marca.pkMarca')
        ->join('modelo', 'dispositivo.fkModelo', '=', 'modelo.pkModelo')
        ->select('dispositivo.*', 'edificio.estatus as edificioEstatus', 'marca.estatus as marcaEstatus', 'modelo.estatus as modeloEstatus')
        ->with('edificio', 'marca', 'modelo')
        ->where('dispositivo.estatus', 1);

    // Aplicar filtros si se han seleccionado
    if ($filtroEdificio) {
        $query->where('dispositivo.fkEdificio', $filtroEdificio);
    }
    if ($filtroModelo) {
        $query->where('dispositivo.fkModelo', $filtroModelo);
    }
    if ($filtroMarca) {
        $query->where('dispositivo.fkMarca', $filtroMarca);
    }

    // Obtener los resultados
    $datosDispositivo = $query->get();

    return view('vistaDispositivo', compact('datosDispositivo'));
}


    public function actualizado($pkDispositivo){
        // $datosDispositivo = Dispositivo::join('fotodispositivo', 'dispositivo.pkDispositivo', '=', 'fotodispositivo.fkDispositivo')->where('fotodispositivo.fkDispositivo', '=', $pkDispositivo->pkDispositivo)->get();
        $datosDispositivo = Dispositivo::findOrFail( $pkDispositivo);
        $datosFoto=FotoDispositivo::where('fkDispositivo', $datosDispositivo->pkDispositivo)->first();
        return view('editarDispositivo', compact('datosDispositivo', 'datosFoto'));
       
    }

    // public function editar(Request $req, $pkDispositivo){
    //     $datosDispositivo=Dispositivo::findOrFail($pkDispositivo);

    //     $datosDispositivo->nombre=$req->nombre;
    //     $datosDispositivo->serie=$req->serie;
    //     $datosDispositivo->fkEdificio=$req->fkEdificio;
    //     $datosDispositivo->fkModelo=$req->fkModelo;
    //     $datosDispositivo->fkMarca=$req->fkMarca;
    //     $datosDispositivo->save();
    //     if ($req->hasFile('fotito')) {
    //         $path = str_replace('/', DIRECTORY_SEPARATOR, $req->file('fotito')->store('public/unploads'));
    //         $datosDispositivo->foto->nombreFoto=$path;
    //         $datosDispositivo->foto->fkDispositivo=$datosDispositivo->pkDispositivo;
    //         $datosDispositivo->foto->save();
    //     }

    //     if ($datosDispositivo->pkDispositivo) {
    //         return redirect('/dispositivo')->with('success', 'Actualizado');
    //     } else {
    //         return redirect('/dispositivo')->with('error', 'Hay algún problema con la información');
    //     }
    // }
    
    public function editar(Request $req, $pkDispositivo){
    $datosDispositivo=Dispositivo::findOrFail($pkDispositivo);
	// $foto = FotoDispositivo::findOrFail('pkDispositivo');

        $datosDispositivo->nombre=$req->nombre;
        $datosDispositivo->serie=$req->serie;
        $datosDispositivo->fkEdificio=$req->fkEdificio;
        $datosDispositivo->fkModelo=$req->fkModelo;
        $datosDispositivo->fkMarca=$req->fkMarca;
        $datosDispositivo->cantidadPuertos=$req->cantidadPuertos;
        $datosDispositivo->fkTipoDispositivo=$req->fkTipoDispositivo;
        $datosDispositivo->save();

        if ($req->hasFile('fotito')) {
            $imagenes = $req->file('fotito');

            foreach ($imagenes as $imagen) {
                // Guarda cada imagen en el sistema de archivos
                $path = $imagen->store('unploads', 'public');

                // Obtiene el nombre del archivo almacenado (sin la ruta completa)
                // $nombreArchivo = basename($path);

                // Guarda la información de la imagen en la base de datos
                // $foto = new FotoDispositivo();
                $datosDispositivo->foto->nombreFoto = $path;
                $datosDispositivo->foto->fkDispositivo = $datosDispositivo->pkDispositivo;
                $datosDispositivo->foto->save();
            }

            if ($datosDispositivo->pkDispositivo) {
                return redirect('/dispositivo')->with('success', 'Guardado');
            } else {
                return redirect('/dispositivo')->with('error', 'Hay algún problema con la información');
            }
        }
    }
}
