<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioDispositivo extends Model
{
    use HasFactory;
    protected $table='servicioDispositivo';
    protected $primaryKey='pkServicioDispositivo';
    protected $fillable=[
        'fkServicio',
        'fkDispositivo'
    ];
    public $timestamps=false;
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'fkServicio');
    }
}
