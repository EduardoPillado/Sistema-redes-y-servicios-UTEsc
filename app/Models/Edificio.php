<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;
    protected $table='edificio';
    protected $primaryKey='pkEdificio';
    protected $fillable=[
        'numeroEdificio',
        'pseudonimo'
    ];
    public $timestamps=false;
    public function dispositivo(){
        return $this->hasMany(Dispositivo::class, 'fkEdificio');
    }
    public function area(){
        return $this->hasMany(Area::class, 'fkEdificio');
    }
}
