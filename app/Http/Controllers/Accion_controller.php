<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accion;

class Accion_controller extends Controller
{
    public function insertar(Request $req){

        $accion= new Accion();
        $accion->nombreAccion=$req->nombreAccion;
        $accion->save();

        if ($accion->pkAccion) {
        return redirect('/accion')->with('success', 'Guardado');
        } else {
            return redirect('/accion')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosAccion=Accion::all();
        return view("agregarVistaAccion", compact('datosAccion'));
    }
    public function mostrarPorId($pkAccion) {
        $datosAccion = Accion::find($pkAccion);
        return view('editarAccion', compact('datosAccion'));
    }

      public function actualizar(Request $req)
      {
          $accion = Accion::find($req->pkAccion);
          $accion->nombreAccion = $req->nombreAccion;
          $accion->save();
          return redirect('/accion')->with('success', 'Actualizado');
      }
}
