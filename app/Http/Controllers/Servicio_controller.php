<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Dispositivo;
use App\Models\ServicioDispositivo;
use App\Models\fotoServicio;
class Servicio_controller extends Controller
{
    public function insertar(Request $req){

        $servicio= new Servicio();
        $dispositivosSeleccionados = $req->input('fkDispositivo', []);
        $servicio->fkTipoServicio=$req->fkTipoServicio;
        $servicio->fkAccion=$req->fkAccion;
        $servicio->fkArea=$req->fkArea;
        $servicio->descripcion=$req->descripcion;
        $servicio->observaciones=$req->observaciones;
        $servicio->fechaServicio=$req->fechaServicio;
        $servicio->save();
        foreach ($dispositivosSeleccionados as $dispositivoId) {
            $dispositivo = Dispositivo::find($dispositivoId);
            $servicio->dispositivos()->attach($dispositivo);
        }
        $servicio->save();
            if ($req->hasFile('fotito')) {
                $imagenes = $req->file('fotito');

                foreach ($imagenes as $imagen) {
                    $path = $imagen->store('public/uploads');

                    $nombreArchivo = basename($path);

                    $foto = new fotoServicio();
                    $foto->nombreFoto = $nombreArchivo;
                    $foto->fkServicio = $servicio->pkServicio;
                    $foto->save();
                }
            }

        if ($servicio->pkServicio) {
            return redirect('/servicio')->with('success', 'Guardado');
        } else {
            return redirect('/servicio')->with('error', 'Hay algún problema con la información');
        }
    }

    public function mostrar(){
        $datosServicio=Servicio::all();
        return view("vistaDeServicios", compact('datosServicio'));
    }

    public function mostrarDetalle($pkServicio) {
        $datosServicio = Servicio::join("serviciodispositivo", "serviciodispositivo.fkServicio", "=", "servicio.pkServicio")
            ->join("dispositivo", "serviciodispositivo.fkDispositivo", "=", "dispositivo.pkDispositivo")
            ->join("marca", "dispositivo.fkMarca", "=", "marca.pkMarca")
            ->join("modelo", "dispositivo.fkModelo", "=", "modelo.pkModelo")
            ->join("tipoServicio", 'servicio.fkTipoServicio', "=", "tipoServicio.pkTipoServicio")
            ->join("accion", 'servicio.fkAccion', "=", "accion.pkAccion")
            ->join("area", 'servicio.fkArea', "=", "area.pkArea")
            ->select('servicio.*', 'dispositivo.*', 'marca.*', 'modelo.*', 'dispositivo.nombre AS dispositivo_nombre', 'marca.nombre AS marca_nombre', 'modelo.nombre AS modelo_nombre')
            ->with('tipoServicio', 'accion', 'area')
            ->where('servicio.pkServicio', $pkServicio)
            ->first();
        
        return view("detalleServicio", compact('datosServicio'));
    }
    
    public function mostrarPorId($pkServicio) {
        $datosServicio = Servicio::find($pkServicio);
        return view('editarServicio', compact('datosServicio'));
    }


    public function actualizar(Request $req) {

        $servicio = Servicio::find($req->pkServicio);
        $dispositivosSeleccionados = $req->input('fkDispositivo', []);
        $servicio->fkTipoServicio=$req->fkTipoServicio;
        $servicio->fkAccion=$req->fkAccion;
        $servicio->fkArea=$req->fkArea;
        $servicio->descripcion=$req->descripcion;
        $servicio->observaciones=$req->observaciones;
        $servicio->fechaServicio=$req->fechaServicio;
        $servicio->save();
        foreach ($dispositivosSeleccionados as $dispositivoId) {
            $dispositivo = Dispositivo::find($dispositivoId);
            $servicio->dispositivos()->attach($dispositivo);
        }
        if ($req->hasFile('fotito')) {
            $imagenes = $req->file('fotito');

            foreach ($imagenes as $imagen) {
                $path = $imagen->store('public/uploads');

                $nombreArchivo = basename($path);

                $servicio->foto->nombreFoto = $nombreArchivo;
                $servicio->foto->fkServicio = $servicio->pkServicio;
                $servicio->foto->save();
            }
        }

        $servicio->save();
        if ($servicio->pkServicio) {
            return redirect('/servicio')->with('success', 'Actualizado');
        } else {
            return redirect('/servicio')->with('error', 'Hay algún problema con la información');
        }
    }
}
