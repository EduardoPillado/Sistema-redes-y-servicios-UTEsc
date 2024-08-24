<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoDispositivo extends Model
{
    use HasFactory;
    protected $table='fotoDispositivo';
    protected $primaryKey='pkFotoDispositivo';
    protected $fillable=[
        'fkDispositivo',
        'nombreFoto'
    ];
    public $timestamps=false;
    public function dispositivo(){
        return $this->belongsTo(Dispositivo::class, 'fkDispositivo');
    }
}
