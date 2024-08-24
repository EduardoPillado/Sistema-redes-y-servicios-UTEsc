<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
    use HasFactory;
    protected $table='destinatario';
    protected $primaryKey='pkDestinatario';
    protected $fillable=[
        'nombreDestinario',
        'apellidoPaternoDestinario',
        'apellidoMaternoDestinario',
        'cargo',
    ];
    public $timestamps=false;
    public function solicitud(){
        return $this->hasMany(Solicitud::class, 'fkDestinatario');
    }
}


