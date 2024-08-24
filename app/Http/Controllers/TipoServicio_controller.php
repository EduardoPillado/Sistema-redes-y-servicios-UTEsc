<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoServicio;

class TipoServicio_controller extends Controller
{
    public function insertar(Request $req){
        $TipoServicio= new TipoServicio();
        $TipoServicio->nombreTipoServicio=$req->nombreTipoServicio;
        $TipoServicio->save();

        if ($TipoServicio->pkTipoServicio) {
        return redirect('/tipoServicio')->with('success', 'Guardado');
        } else {
            return redirect('/tipoServicio')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosTipoServicio=TipoServicio::all();
        return view("agregarVistaTipoServicio", compact('datosTipoServicio'));
    }
    public function mostrarPorId($pkTipoServicio){
        $datosTipoServicio = TipoServicio::find($pkTipoServicio);
        return view('editarTipoServicio', compact('datosTipoServicio'));
    }
    public function actualizar(Request $req){
        $tipoServicio = TipoServicio::find($req->pkTipoServicio);
        $tipoServicio->nombreTipoServicio = $req->nombreTipoServicio;
        $tipoServicio->save();
        return redirect('/tipoServicio')->with('success', 'Actualizado');
    }
}
