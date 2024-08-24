<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table="marca";
    //si mi id se hubiera llamado diferente
    protected $primaryKey = 'pkMarca';
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;
    public function dispositivo(){
        return $this->hasMany(Dispositivo::class, 'fkMarca');
    }

}
