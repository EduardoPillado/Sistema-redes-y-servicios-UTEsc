<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoRed;

class TipoRed_controller extends Controller
{
    public function insertar(Request $req){

        $tipoRed= new TipoRed();
        $tipoRed->nombre=$req->nombre;
        $tipoRed->estatusTipoRed=1;
        $tipoRed->save();

        if ($tipoRed->pkTipoRed) {
        return redirect('/tipoRed')->with('success', 'Guardado');
        } else {
            return redirect('/tipoRed')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosTipoRed=TipoRed::where('tipoRed.estatusTipoRed', '=', 1)->get();
        return view("agregarVistaTipoRed", compact('datosTipoRed'));
    }
    public function mostrarPorId($pkTipoRed) {
        $datosTipoRed = TipoRed::find($pkTipoRed);
        return view('editarTipoRed', compact('datosTipoRed'));
    }
    
    public function baja($pkTipoRed) {
        $tipoRed = TipoRed::find($pkTipoRed);
        $tipoRed->estatusTipoRed = 0;
        $tipoRed->save();
        return redirect('/tipoRed')->with('success', 'Tipo de red dado de baja');
    }
      public function actualizar(Request $req)
      {
          $tipoRed = TipoRed::find($req->pkTipoRed);
          $tipoRed->nombre = $req->nombre;
          $tipoRed->estatusTipoRed = 1;
          $tipoRed->save();
          return redirect('/tipoRed')->with('success', 'Actualizado');
      }

}
