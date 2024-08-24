<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncargadoDeArea;
use App\Models\Persona;

class EncargadoDeArea_controller extends Controller
{
    public function insertar(Request $req){

        $persona=new Persona();
        $persona->nombre=$req->nombre;
        $persona->apellidoPaterno=$req->apellidoPaterno;
        $persona->apellidoMaterno=$req->apellidoMaterno;
        $persona->correo=$req->correo;
        $persona->estatus=1;
        $persona->save();

        $encargadoDeArea= new EncargadoDeArea();
        $encargadoDeArea->fkPersona=$persona->pkPersona;
        $encargadoDeArea->fkArea=$req->fkArea;
        $encargadoDeArea->estatusEncargadoDeArea=1;
        $encargadoDeArea->save();

        if ($encargadoDeArea->pkEncargadoDeArea) {
        return redirect('/encargadoDeArea')->with('success', 'Guardado');
        } else {
            return redirect('/encargadoDeArea')->with('error', 'Hay algún problema con la información');
        }
    }
    public function mostrar(){
        $datosEncargadoDeArea=EncargadoDeArea::join('persona', 'encargadoDeArea.fkPersona', '=', 'persona.pkPersona')
        ->join('area', 'encargadoDeArea.fkArea', '=', 'area.pkArea')
        ->with('persona', 'area')
        ->where('encargadoDeArea.estatusEncargadoDeArea', '=', 1)
        ->get();
        return view("agregarVistaEncargadoDeArea", compact('datosEncargadoDeArea'));
    }
    public function mostrarPorId($pkEncargadoDeArea) {
        $datosEncargadoDeArea = EncargadoDeArea::find($pkEncargadoDeArea);
        return view('editarEncargadoDeArea', compact('datosEncargadoDeArea'));
    }
    
    public function baja($pkEncargadoDeArea) {
        $encargadoDeArea = EncargadoDeArea::find($pkEncargadoDeArea);
        $encargadoDeArea->estatusEncargadoDeArea = 0;
        $encargadoDeArea->save();
        return redirect('/encargadoDeArea')->with('success', 'Encargado de área dado de baja');
    }
    public function actualizar(Request $req){
        $encargadoDeArea = EncargadoDeArea::find($req->pkEncargadoDeArea);

        $encargadoDeArea->persona->nombre=$req->nombre;
        $encargadoDeArea->persona->apellidoPaterno=$req->apellidoPaterno;
        $encargadoDeArea->persona->apellidoMaterno=$req->apellidoMaterno;
        $encargadoDeArea->persona->correo=$req->correo;
        $encargadoDeArea->persona->estatus=1;
        $encargadoDeArea->persona->save();

        $encargadoDeArea->fkPersona = $encargadoDeArea->persona->pkPersona;
        $encargadoDeArea->fkArea = $req->fkArea;
        $encargadoDeArea->estatusEncargadoDeArea = 1;
        $encargadoDeArea->save();
        return redirect('/encargadoDeArea')->with('success', 'Actualizado');
    }
}
