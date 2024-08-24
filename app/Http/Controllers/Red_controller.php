<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Red;
use App\Models\DispositivoRed;
use App\Models\Dispositivo;

class Red_controller extends Controller
{
    public function insertar(Request $req){
        $red=new Red();
        $red->nombreRed=$req->nombreRed;
        $red->fkTipoRed=$req->fkTipoRed;
        $red->vlan=$req->vlan;
        $red->fecha=$req->fecha;
        $red->estatus=1;
        $dispositivosSeleccionados = $req->input('fkDispositivo', []);
        $red->save();

        foreach ($dispositivosSeleccionados as $dispositivo){
            $dispositivoRed = new DispositivoRed();
            $dispositivoRed->fkDispositivo = $dispositivo;
            $dispositivoRed->fkRed = $red->pkRed;
            $dispositivoRed->save();
        }
        $red->save();

        if ($red->pkRed) {
            return redirect('/red')->with('success', 'Guardado');
        } else {
            return redirect('/red')->with('error', 'Hay algún problema con la información');
        }
    }

    private function obtenerDatosRed(){
        return Red::join("tipoRed", "tipoRed.pkTipoRed", "=", "red.fkTipoRed")
            ->join("dispositivoRed", "dispositivoRed.fkRed", "=", "red.pkRed")
            ->join("dispositivo", "dispositivo.pkDispositivo", "=", "dispositivoRed.fkDispositivo")
            ->select(
                'tipoRed.*', 'red.*',
                'tipoRed.nombre AS tipoRed_nombre'
            )
            ->distinct('pkRed');
    }

    public function detalle($pkRed)
    {
        $datosRed = Red::join("tipoRed", "tipoRed.pkTipoRed", "=", "red.fkTipoRed")
            ->join("dispositivoRed", "dispositivoRed.fkRed", "=", "red.pkRed")
            ->join("dispositivo", "dispositivo.pkDispositivo", "=", "dispositivoRed.fkDispositivo")
            ->select(
                'tipoRed.*', 'red.*',
                'tipoRed.nombre AS tipoRed_nombre'
            )
            ->where('red.pkRed', $pkRed)
            ->first();
            $datosDispositivo = Dispositivo::join("dispositivoRed", "dispositivoRed.fkDispositivo", "=", "dispositivo.pkDispositivo")
            ->join('red', 'red.pkRed', '=', 'dispositivoRed.fkRed')
            ->join('marca', 'dispositivo.fkMarca', '=', 'marca.pkMarca')
            ->join('modelo', 'dispositivo.fkModelo', '=', 'modelo.pkModelo')
            ->select('dispositivo.*', 'modelo.nombre as modelo_nombre', 'marca.nombre as marca_nombre')
            ->where('dispositivoRed.fkRed', '=', $pkRed)
            ->get();
        
        if ($datosRed) {
            return view('detalleRed')->with('datosRed', $datosRed)->with('datosDispositivo', $datosDispositivo);
        } else {
            return redirect()->route('redesRegistradas')->with('message', 'El registro no existe.');
        }
    }
    
    

    public function mostrar(Request $req){
        $datosRed = $this->obtenerDatosRed()->get();

        return view("vistaRedes", compact("datosRed"));
    }

    public function mostrarInputVlan(){
        $datosRed = $this->obtenerDatosRed()
            ->where(function($query) {
                $query->whereRaw('UPPER(tipoRed.nombre) LIKE ?', ['%ACCESO%']);
            })
            ->get();
        
        if ($datosRed->count() === 0) {
            return redirect()->back()->with('message', 'No se encontro nada.');
        }
        return view('agregarRed', compact('datosRed'));
    }

    public function baja($pkRed){
        $dato = Red::findOrFail($pkRed);
        
        if ($dato) {
            $dato->estatus = 0;
            $dato->save();

            return redirect('/red')->with('success', 'Red dada de baja');
        } else {
            return redirect('/red')->with('error', 'Hay algún problema con la información');
        }
    }

    public function actualizado($pkRed){
        $datosRed = Red::findOrFail($pkRed);
        return view('editarRed', compact('datosRed'));
    }

    public function editar(Request $req, $pkRed){
        $datosRed=Red::findOrFail($pkRed);

        $datosRed->nombreRed=$req->nombreRed;
        $datosRed->fkTipoRed=$req->fkTipoRed;
        $datosRed->vlan=$req->vlan;
        $datosRed->fecha=$req->fecha;
        $datosRed->save();

        if ($datosRed->pkRed) {
            return redirect('/red')->with('success', 'Actualizado');
        } else {
            return redirect('/red')->with('error', 'Hay algún problema con la información');
        }
    }
}
