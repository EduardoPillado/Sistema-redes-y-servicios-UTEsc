<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class Area_controller extends Controller
{
    public function insertar(Request $req){
        $area=new Area();
        $area->nom_numArea=$req->nom_numArea;
        $area->fkTipoArea=$req->fkTipoArea;
        $area->fkEdificio=$req->fkEdificio;
        $area->estatusArea=1;
        $area->save();

        if ($area->pkArea) {
            return redirect('/verArea')->with('success', 'Guardado');
        } else {
            return redirect('/verArea')->with('error', 'Hay algún problema con la información');
        }
    }

    public function mostrar(){
        $datosArea=Area::join('tipoArea', 'area.fkTipoArea', '=', 'tipoArea.pkTipoArea')
        ->join('edificio', 'area.fkEdificio', '=', 'edificio.pkEdificio')
        ->with('tipoArea', 'edificio')
        ->where('area.estatusArea', '=', 1)
        ->get();
        return view('areaVista', compact('datosArea'));
    }

    public function baja($pkArea){
        $dato = Area::findOrFail($pkArea);
        
        if ($dato) {
            $dato->estatusArea = 0;
            $dato->save();

            return redirect('/verArea')->with('success', 'Área dada de baja');
        } else {
            return redirect('/verArea')->with('error', 'Hay algún problema con la información');
        }
    }

    public function actualizado($pkArea){
        $datosArea = Area::findOrFail($pkArea);
        return view('editarArea', compact('datosArea'));
    }

    public function editar(Request $req, $pkArea){
        $datosArea=Area::findOrFail($pkArea);

        $datosArea->nom_numArea=$req->nom_numArea;
        $datosArea->fkTipoArea=$req->fkTipoArea;
        $datosArea->fkEdificio=$req->fkEdificio;
        $datosArea->estatusArea=1;
        $datosArea->save();

        if ($datosArea->pkArea) {
            return redirect('/verArea')->with('success', 'Actualizado');
        } else {
            return redirect('/verArea')->with('error', 'Hay algún problema con la información');
        }
    }
}
