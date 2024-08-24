<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;
    protected $table='accion';
    protected $primaryKey='pkAccion';
    protected $fillable=[
        'nombreAccion'
    ];
    public $timestamps=false;
    public function servicio(){
        return $this->hasMany(Servicio::class, 'fkAccion');
    }
}
