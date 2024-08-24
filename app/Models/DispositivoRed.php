<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoRed extends Model
{
    use HasFactory;
    protected $table='dispositivoRed';
    protected $primaryKey='pkDispositivoRed';
    protected $fillable=[
        'fkDispositivo',
        'fkRed'
    ];
    public $timestamps=false;
    public function red(){
        return $this->belongsTo(Red::class, 'fkRed');
    }
}
