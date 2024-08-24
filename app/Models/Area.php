<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table='area';
    protected $primaryKey='pkArea';
    protected $fillable=[
        'nom_numArea',
        'fkTipoAre',
        'fkEdificio'
    ];
    public $timestamps=false;
    public function tipoArea(){
        return $this->belongsTo(TipoArea::class, 'fkTipoArea');
    }
    public function edificio(){
        return $this->belongsTo(Edificio::class, 'fkEdificio');
    }
    public function encargadoDeArea(){
        return $this->hasMany(EncargadoDeArea::class, 'fkArea');
    }
}
