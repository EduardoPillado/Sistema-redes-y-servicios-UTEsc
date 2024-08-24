<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDispositivo extends Model
{
    use HasFactory;
    protected $table='tipoDispositivo';
    protected $primaryKey='pkTipoDispositivo';
    protected $fillable=[
        'nombreTipoDispositivo',
        'estatusTipoDispositivo'
    ];
    public function dispositivo(){
        return $this->hasMany(Dispositivo::class, 'fkTipoDispositivo');
    }
}
