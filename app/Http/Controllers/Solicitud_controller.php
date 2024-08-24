<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Destinatario;

class Solicitud_controller extends Controller
{
    public function insertar(Request $req){
        $destinatario = new Destinatario();
        $destinatario->nombreDestinatario=$req->nombreDestinatario;
        $destinatario->apellidoPaternoDestinatario=$req->apellidoPaternoDestinatario;
        $destinatario->apellidoMaternoDestinatario=$req->apellidoMaternoDestinatario;
        $destinatario->cargo=$req->cargo;

        $destinatario->save();
        $solicitud = new Solicitud();
        $solicitud->asunto = $req->asunto;
        $solicitud->fkDestinatario = $destinatario->pkDestinatario;
        $solicitud->descripcionSolicitud = $req->descripcionSolicitud;
        $solicitud->caracteristicas = $req->caracteristicas;
        $solicitud->costo = $req->costo;
        $solicitud->despedida = $req->despedida;
        $solicitud->fechaSolicitud = $req->fechaSolicitud;
        $solicitud->solicitante = $req->solicitante;
        $solicitud->cargoSolicitante = $req->cargoSolicitante;
        $solicitud->save();
        
        if ($solicitud->pkSolicitud) {
            return redirect('/solicitud')->with('success', 'Guardado');
        } else {
            return redirect('/solicitud')->with('error', 'Hay algún problema con la información');
        }
    }
    private function obtenerDatosSolicitud(){
        return Solicitud::join('destinatario', 'solicitud.fkDestinatario', '=', 'destinatario.pkDestinatario');
    }
    public function mostrar(){
        $datosSolicitud = $this->obtenerDatosSolicitud()->get();
        return view("vistaDeSolicitudes", compact('datosSolicitud'));
    }
    public function detalle($pkSolicitud){
        $datosSolicitud = $this->obtenerDatosSolicitud()
        ->where('solicitud.pkSolicitud', $pkSolicitud)
        ->first();
    
        if ($datosSolicitud) {
            return view('detalleSolicitud')->with('datosSolicitud', [$datosSolicitud]);
        } else {
            return redirect()->route('verSolicitudes')->with('message', 'El registro no existe.');
        }
    }
    public function mostrarPorId($pkSolicitud) {
        $datosSolicitud = Solicitud::find($pkSolicitud);
        return view('editarSolicitud', compact('datosSolicitud'));
    }
    public function actualizar(Request $req) {
        $solicitud = Solicitud::find($req->pkSolicitud);
        $solicitud->destinatario->nombreDestinatario=$req->nombreDestinatario;
        $solicitud->destinatario->apellidoPaternoDestinatario=$req->apellidoPaternoDestinatario;
        $solicitud->destinatario->apellidoMaternoDestinatario=$req->apellidoMaternoDestinatario;
        $solicitud->destinatario->cargo=$req->cargo;

        $solicitud->destinatario->save();

        $solicitud->asunto = $req->asunto;
        $solicitud->fkDestinatario = $solicitud->destinatario->pkDestinatario;
        $solicitud->descripcionSolicitud = $req->descripcionSolicitud;
        $solicitud->caracteristicas = $req->caracteristicas;
        $solicitud->costo = $req->costo;
        $solicitud->despedida = $req->despedida;
        $solicitud->fechaSolicitud = $req->fechaSolicitud;
        $solicitud->solicitante = $req->solicitante;
        $solicitud->cargoSolicitante = $req->cargoSolicitante;

        $solicitud->save();

        if ($solicitud->pkSolicitud) {
            return redirect('/verSolicitudes')->with('success', 'Actualizado');
        } else {
            return redirect('/verSolicitudes')->with('error', 'Hay algún problema con la información');
        }
    }
}
