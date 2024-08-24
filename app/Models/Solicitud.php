<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table='solicitud';
    protected $primaryKey='pkSolicitud';
    protected $fillable=[
        'asunto',
        'fkDestinatario',
        'descripcionSolicitud',
        'caracteristicas',
        'costo',
        'despedida',
        'fechaSolicitud',
        'solicitante',
        'cargoSolicitante'
    ];
    public $timestamps=false;
    public function destinatario(){
        return $this->belongsTo(Destinatario::class, 'fkDestinatario');
    }
}
