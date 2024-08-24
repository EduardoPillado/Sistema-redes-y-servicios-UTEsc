<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArea extends Model
{
    use HasFactory;
    protected $table='tipoArea';
    protected $primaryKey='pkTipoArea';
    protected $fillable=[
        'nombreTipoArea',
    ];
    public $timestamps=false;
    public function area(){
        return $this->hasMany(Area::class, 'fkTipoArea');
    }
}
