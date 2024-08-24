<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRed extends Model
{
    use HasFactory;
    protected $table='tipoRed';
    protected $primaryKey='pkTipoRed';
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;
    public function red(){
        return $this->hasMany(Red::class, 'fkTipoRed');
    }
}
