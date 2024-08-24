<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table="usuario";
    //si mi id se hubiera llamado diferente
    protected $primaryKey = 'pkUsuario';
    //protected $primaryKey='pk_persona'
    public $timestamps=false;
}
