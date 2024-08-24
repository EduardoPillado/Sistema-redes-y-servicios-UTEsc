<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;
    protected $table='dispositivo';
    protected $primaryKey='pkDispositivo';
    protected $fillable=[
        'nombre',
        'serie',
        'fkEdificio',
        'fkModelo',
        'fkMarca',
        'cantidadPuertos',
        'fkTipoDispositivo',
        'estatus'
    ];
    public $timestamps=false;
    public function edificio(){
        return $this->belongsTo(Edificio::class, 'fkEdificio');
    }
    public function modelo(){
        return $this->belongsTo(Modelo::class, 'fkModelo');
    }
    public function marca(){
        return $this->belongsTo(Marca::class, 'fkMarca');
    }
    public function tipoDispositivo(){
        return $this->belongsTo(TipoDispositivo::class, 'fkTipoDispositivo');
    }
    public function fotos(){
        return $this->hasMany(FotoDispositivo::class, 'fkDispositivo');
    }
}
