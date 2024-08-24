<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDispositivo;

class TipoDispositivo_controller extends Controller
{
    public function insertar(Request $req){

        $tipoDispositivo= new TipoDispositivo();
        $tipoDispositivo->nombreTipoDispositivo=$req->nombreTipoDispositivo;
        $tipoDispositivo->estatusTipoDispositivo=1;
        $tipoDispositivo->save();

        if ($tipoDispositivo->pkTipoDispositivo) {
        return redirect('/tipoDispositivo')->with('success', 'Guardado');
        } else {
            return redirect('/tipoDispositivo')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosTipoDispositivo=TipoDispositivo::where('tipoDispositivo.estatusTipoDispositivo', '=', 1)->get();
        return view("agregarVistaTipoDispositivo", compact('datosTipoDispositivo'));
    }
    public function mostrarPorId($pkTipoDispositivo) {
        $datosTipoDispositivo = TipoDispositivo::find($pkTipoDispositivo);
        return view('editarTipoDispositivo', compact('datosTipoDispositivo'));
    }
    
    public function baja($pkTipoDispositivo) {
        $tipoDispositivo = TipoDispositivo::find($pkTipoDispositivo);
        $tipoDispositivo->estatusTipoDispositivo = 0;
        $tipoDispositivo->save();
        return redirect('/tipoDispositivo')->with('success', 'Tipo de dispositivo dado de baja');
    }
      public function actualizar(Request $req)
      {
          $tipoDispositivo = TipoDispositivo::find($req->pkTipoDispositivo);
          $tipoDispositivo->nombreTipoDispositivo = $req->nombreTipoDispositivo;
          $tipoDispositivo->estatusTipoDispositivo = 1;
          $tipoDispositivo->save();
          return redirect('/tipoDispositivo')->with('success', 'Actualizado');
      }
}
