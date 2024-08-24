<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edificio;

class Edificio_controller extends Controller
{
    function insertar(Request $req){

        $edificio= new Edificio();
        $edificio->nombreEdificio=$req->nombreEdificio;
        $edificio->pseudonimo=$req->pseudonimo;
        $edificio->estatus=1;
        $edificio->save();
        if ($edificio->pkEdificio) {
            return redirect('/Edificio')->with('success', 'Guardado');
        } else {
            return redirect('/Edificio')->with('error', 'Hay algún problema con la información');
        }

    }
    public function mostrar(){
        $datosEdificio=Edificio::where('edificio.estatus', '=', 1)->get();
        return view("agregarYVistaEdificio", compact('datosEdificio'));
    }
    public function mostrarPorId($pkEdificio) {
        $datosEdificio = Edificio::find($pkEdificio);
        return view('actualizarEdificio', compact('datosEdificio'));
    }
    
    function baja($pkEdificio) {
        $edificio = Edificio::find($pkEdificio);
        $edificio->estatus = 0;
        $edificio->save();
        return redirect('/Edificio')->with('success', 'Edificio dado de baja');
      }
      public function actualizar(Request $req)
      {
          $edificio = Edificio::find($req->pkEdificio);
          $edificio->nombreEdificio = $req->nombreEdificio;
          $edificio->pseudonimo = $req->pseudonimo;
          $edificio->estatus = 1;
          $edificio->save();
          return redirect('/Edificio')->with('success', 'Actualizado');
      }
}
