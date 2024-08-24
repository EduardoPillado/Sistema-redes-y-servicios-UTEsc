<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Persona;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class Usuario_controller extends Controller
{
    public function login(Request $request)
    {
        $nombre = $request->input('nombre');
        $contraseña = $request->input('contraseña');
    
        $usuario = $this->buscar($nombre,$contraseña);
    
        if ($usuario) {
            // Establecer las variables de sesión
            session([
                'id' => $usuario->pkUsuario,
                'nombre' => $usuario->nombre,
                'contraseña' => $contraseña,
                'fkTipoUsuario' => $usuario->fkTipoUsuario
            ]);
    
            if ($usuario->fkTipoUsuario == 1) { // Redirigir al usuario con un mensaje de bienvenida
                return redirect('/redes')->with('success', 'Bienvenido(a) a Sistema de Redes');
            }
            if ($usuario->fkTipoUsuario == 2) {
                return redirect('/redes')->with('success', 'Bienvenido(a) a Sistema de redes');
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect('/login1')
            ->with('error_credentials', 'Usuario o contraseña incorrectos')
            ->with('error_retry', 'Introduzca sus datos de nuevo')
            ->with('use_js_alerts', true);
        }
    }

    private function buscar($nombre, $contraseña)
    {
      
        $usuario = Usuario::where('nombre', $nombre)
            ->where('estatus', 1)
            ->first();
        if ($usuario && password_verify($contraseña,  $usuario->contraseña) ) {
            
            return $usuario;
        } else {
            return null;
        }
    }

    public function agregar(Request $req)
    {
        $persona= new Persona();
        //nombre base de datos       //nombre formulario
        $persona->nombre=$req->nombre;
        $persona->apellidoPaterno=$req->apellidoPaterno;
        $persona->apellidoMaterno=$req->apellidoMaterno;
        $persona->correo=$req->correo;
        $persona->estatus=1;

        $persona->save();
        $persona_id = $persona->pkPersona;
        $usuario = new Usuario();
        $usuario->nombre= $req->nombreUsuario;
        $usuario->contraseña= password_hash($req->contraseña , PASSWORD_DEFAULT);
        $usuario->estatus=1;
        $usuario->fkTipoUsuario=$req->fkTipoUsuario;
        $usuario->fkPersona=$persona_id;
        $usuario->save();
        return redirect()->route('login1');
       
    }

    public function actualizar(Request $req)
    {
        $usuario= Usuario::find($req->pkUsuario);
        //nombre base de datos       //nombre formulario
        $usuario->nombre=$req->nombreUsuario;
        if (!empty($req->contraseña)) {
            $usuario->contraseña = password_hash($req->contraseña, PASSWORD_DEFAULT);
        }
        $usuario->fkTipoUsuario=$req->fkTipoUsuario;
        $usuario->save();
        return redirect()->route('vistaUsuario');
    }

    public function baja(Request $req)
    {
        $usuario= Usuario::find($req->pkUsuario);
        //nombre base de datos       //nombre formulario
        $usuario->estatus=0;
        $usuario->save();
        return redirect()->route('vistaUsuario');
       
    }


    public function buscarUsuarios(Request $request) {
        $searchTerm = $request->query('searchTerm');
        $datosUsuarios = Usuario::join('tipoUsuario', 'usuario.fkTipoUsuario', '=', 'tipoUsuario.pkTipoUsuario')
                        ->join('persona', 'usuario.fkPersona', '=', 'persona.pkPersona')
                        ->select('usuario.nombre as nombre_usuario', 'tipoUsuario.*', 'usuario.pkUsuario','persona.correo','persona.apellidoPaterno','persona.apellidoMaterno','persona.nombre as nombre_persona')
                        ->where('usuario.estatus', '=', '1')
                        ->where(function($query) use ($searchTerm) {
                            $query->where('usuario.nombre', 'LIKE', '%' . $searchTerm . '%')
                                  ->orWhere('persona.correo', 'LIKE', '%' . $searchTerm . '%')
                                  ->orWhere('persona.apellidoPaterno', 'LIKE', '%' . $searchTerm . '%')
                                  ->orWhere('persona.apellidoMaterno', 'LIKE', '%' . $searchTerm . '%')
                                  ->orWhere('persona.nombre', 'LIKE', '%' . $searchTerm . '%');
                        })
                        ->get();
    
        return response()->json($datosUsuarios);
    }
      
      function mostrarUsuarioPorId($pkUsuario, $vista = "editarUsuario"){
        $dato=Usuario::join('tipoUsuario', 'usuario.fkTipoUsuario', '=', 'tipoUsuario.pkTipoUsuario')
                    ->join('persona', 'usuario.fkPersona', '=', 'persona.pkPersona')
                    ->select('usuario.nombre as nombre_usuario', 'tipoUsuario.*', 'usuario.pkUsuario','persona.correo','persona.apellidoPaterno','persona.apellidoMaterno','persona.nombre as nombre_persona')->where('usuario.pkUsuario', '=', $pkUsuario)->first();
        return view($vista,compact("dato"));
      }

      public function logout() {
        Auth::logout(); 
        session()->flush();// Cierra la sesión del usuario
        return redirect('/login1')->with('success', 'Sesión cerrada'); // Redirige a la página de inicio de sesión u otra página de tu elección
    }
}
