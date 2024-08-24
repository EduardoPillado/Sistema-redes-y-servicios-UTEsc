<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class Nota_controller extends Controller
{
    function insertar(Request $req){
        $nota= new Nota();
                 //nombre base de datos       //nombre formulario
        $nota->titulo=$req->titulo;
        $nota->texto=$req->texto;
        $nota->fkpersona=$req->fkpersona;

        $nota->save();
        //manda a la ruta la cual manda a la lista con datos
        return redirect()->route("nota.mostrar");
    }
    function mostrar (){

        $datos_notas=Nota::join("persona","nota.fkpersona","=","persona.id")->get();
        return view("lista_nota",compact("datos_notas"));
    
    }

}
