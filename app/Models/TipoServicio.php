<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;
    protected $table='tipoServicio';
    protected $primaryKey='pkTipoServicio';
    protected $fillable=[
        'nombreTipoServicio'
    ];
    public $timestamps=false;
    public function servicio(){
        return $this->hasMany(Servicio::class, 'fkTipoServicio');
    }
}
