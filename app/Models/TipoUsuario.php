<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table="tipousuario";
    //si mi id se hubiera llamado diferente
    protected $primaryKey = 'pkTipoUsuario';
    //protected $primaryKey='pk_persona'
    protected $fillable=[
        'nombreTipo'
    ];
    public $timestamps=false;
}
