<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    use HasFactory;
    protected $table='red';
    protected $primaryKey='pkRed';
    protected $fillable=[
        'nombreRed',
        'fkTipoRed',
        'vlan',
        'fecha'
    ];
    public $timestamps=false;
    public function dispositivos(){
        return $this->belongsToMany(Dispositivo::class, 'dispositivoRed', 'fkDispositivo', 'fkRed');
    }
    public function dispositivo(){
        return $this->belongsToMany(Dispositivo::class, 'dispositivoRed', 'fkDispositivo', 'fkRed');
    }
    public function dispositivoRed(){
        return $this->hasMany(DispositivoRed::class, 'fkRed');
    }
    public function tipoRed(){
        return $this->belongsTo(TipoRed::class, 'fkTipoRed');
    }
}
