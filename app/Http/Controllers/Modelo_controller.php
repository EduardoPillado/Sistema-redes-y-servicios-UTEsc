<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;

class Modelo_controller extends Controller
{
    public function insertar(Request $req){
        $modelo=new Modelo();
        $modelo->nombre=$req->nombre;
        $modelo->estatus=1;
        $modelo->save();
        if ($modelo->pkModelo) {
            return redirect('/modelo')->with('success', 'Guardado');
        } else {
            return redirect('/modelo')->with('error', 'Hay algún problema con la información');
        }

    }

    public function mostrar(){
        $datosModelo=Modelo::where('estatus', '=', 1)->get();
        return view('agregarVistaModelo', compact('datosModelo'));
    }

    public function baja($pkModelo){
        $dato = Modelo::findOrFail($pkModelo);
        
        if ($dato) {
            $dato->estatus = 0;
            $dato->save();

            return redirect('/modelo')->with('success', 'Modelo dado de baja');
        } else {
            return redirect('/modelo')->with('error', 'Hay algún problema con la información');
        }
    }

    public function actualizado($pkModelo){
        $datosModelo = Modelo::findOrFail($pkModelo);
        return view('editarModelo', compact('datosModelo'));
    }

    public function editar(Request $req, $pkModelo){
        $datosModelo=Modelo::findOrFail($pkModelo);

        $datosModelo->nombre=$req->nombre;
        $datosModelo->save();

        if ($datosModelo->pkModelo) {
            return redirect('/modelo')->with('success', 'Actualizado');
        } else {
            return redirect('/modelo')->with('error', 'Hay algún problema con la información');
        }
    }
}
