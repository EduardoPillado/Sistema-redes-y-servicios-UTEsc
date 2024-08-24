<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncargadoDeArea extends Model
{
    use HasFactory;
    protected $table="encargadoDeArea";
    protected $primaryKey = 'pkEncargadoDeArea';
    protected $fillable=[
        'fkPersona',
        'fkArea',
        'estatusEncargadoDeArea'
    ];
    public $timestamps=false;
    public function persona(){
        return $this->belongsTo(Persona::class, 'fkPersona');
    }
    public function area(){
        return $this->belongsTo(Area::class, 'fkArea');
    }
}
