<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table='modelo';
    protected $primaryKey='pkModelo';
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;
    public function dispositivo(){
        return $this->hasMany(Dispositivo::class, 'fkModelo');
    }
}
