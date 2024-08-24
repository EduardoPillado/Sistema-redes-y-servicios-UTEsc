<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class Marca_controller extends Controller
{
    public function insertar(Request $req){
        $marca=new Marca();
        $marca->nombre=$req->nombre;
        $marca->estatus=1;
        $marca->save();

        if ($marca->pkMarca) {
            return redirect('/marca')->with('success', 'Guardado');
        } else {
            return redirect('/marca')->with('error', 'Hay algún problema con la información');
        }
    }

    public function mostrar(){
        $datosMarca=Marca::where('estatus', '=', 1)->get();
        return view('agregarVistaMarca', compact('datosMarca'));
    }

    public function baja($pkMarca){
        $dato = Marca::findOrFail($pkMarca);
        
        if ($dato) {
            $dato->estatus = 0;
            $dato->save();

            return redirect('/marca')->with('success', 'Marca dada de baja');
        } else {
            return redirect('/marca')->with('error', 'Hay algún problema con la información');
        }
    }

    public function actualizado($pkMarca){
        $datosMarca = Marca::findOrFail($pkMarca);
        return view('editarMarca', compact('datosMarca'));
    }

    public function editar(Request $req, $pkMarca){
        $datosMarca=Marca::findOrFail($pkMarca);

        $datosMarca->nombre=$req->nombre;
        $datosMarca->save();

        if ($datosMarca->pkMarca) {
            return redirect('/marca')->with('success', 'Actualizado');
        } else {
            return redirect('/marca')->with('error', 'Hay algún problema con la información');
        }
    }
}
