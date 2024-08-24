<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table='servicio';
    protected $primaryKey='pkServicio';
    protected $fillable=[
        'fkDispositivo',
        'fkTipoServicio',
        'fkAccion',
        'fkArea',
        'descripcion',
        'observaciones',
        'fechaServicio'
    ];
    public $timestamps=false;
    public function dispositivos(){
        return $this->belongsToMany(Dispositivo::class, 'servicioDispositivo', 'fkServicio', 'fkDispositivo');
    }
    public function servicioDispositivo(){
        return $this->hasMany(ServicioDispositivo::class, 'fkServicio');
    }
    public function tipoServicio(){
        return $this->belongsTo(TipoServicio::class, 'fkTipoServicio');
    }
    public function accion(){
        return $this->belongsTo(Accion::class, 'fkAccion');
    }
    public function area(){
        return $this->belongsTo(Area::class, 'fkArea');
    }
}
