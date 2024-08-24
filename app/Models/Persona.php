<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table="persona";
    protected $primaryKey = 'pkPersona';
    protected $fillable=[
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'estatus',
        'correo'
    ];
    public $timestamps=false;
    public function encargadoDeArea(){
        return $this->hasMany(EncargadoDeArea::class, 'fkPersona');
    }
}
