<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoArea;

class TipoArea_controller extends Controller
{
    public function insertar(Request $req){

        $TipoArea= new TipoArea();
        $TipoArea->nombreTipoArea=$req->nombreTipoArea;
        $TipoArea->estatusTipoArea=1;
        $TipoArea->save();

        if ($TipoArea->pkTipoArea) {
        return redirect('/tipoArea')->with('success', 'Guardado');
        } else {
            return redirect('/tipoArea')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosTipoArea=TipoArea::where('tipoArea.estatusTipoArea', '=', 1)->get();
        return view("agregarVistaTipoArea", compact('datosTipoArea'));
    }
    public function mostrarPorId($pkTipoArea) {
        $datosTipoArea = TipoArea::find($pkTipoArea);
        return view('editarTipoArea', compact('datosTipoArea'));
    }
    
    public function baja($pkTipoArea) {
        $tipoArea = TipoArea::find($pkTipoArea);
        $tipoArea->estatusTipoArea = 0;
        $tipoArea->save();
        return redirect('/tipoArea')->with('success', 'Tipo de area dado de baja');
    }
      public function actualizar(Request $req)
      {
          $tipoArea = TipoArea::find($req->pkTipoArea);
          $tipoArea->nombreTipoArea = $req->nombreTipoArea;
          $tipoArea->estatusTipoArea = 1;
          $tipoArea->save();
          return redirect('/tipoArea')->with('success', 'Actualizado');
      }
}
