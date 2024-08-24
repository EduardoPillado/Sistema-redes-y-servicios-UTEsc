<?php

namespace App\Http\Controllers;
use App\Models\Persona;

use Illuminate\Http\Request;

class Persona_controller extends Controller
{
    
    function insertar(Request $req){

        $persona= new Persona();
                 //nombre base de datos       //nombre formulario
        $persona->nombre=$req->nombre;
        $persona->apellidoPaterno=$req->apellidoPaterno;
        $persona->apellidoMaterno=$req->apellidoMaterno;
        $persona->correo=$req->correo;
        $persona->estatus=1;

        $persona->save();
    
    }
}
