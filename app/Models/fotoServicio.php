<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoServicio extends Model
{
    use HasFactory;
    protected $table='fotoServicio';
    protected $primaryKey='pkFotoServicio';
    protected $fillable=[
        'fkServicio',
        'nombreFoto'
    ];
    public $timestamps=false;
    public function servicio(){
        return $this->belongsTo(Dispositivo::class, 'fkServicio', 'pkServicio');
    }
}

