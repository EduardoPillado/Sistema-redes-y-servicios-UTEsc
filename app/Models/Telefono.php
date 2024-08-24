<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $table="telefono";
    //si mi id se hubiera llamado diferente
    protected $primaryKey = 'pkTelefono';
    //protected $primaryKey='pk_persona'
    protected $fillable=[
        'numero',
        'fkPersona'
    ];
    public $timestamps=false;
}
