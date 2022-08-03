<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //La tabla a conectar:
    protected $table = "continents";
    //La clave primaria de esa tabla:
    protected $primaryKey = "continent_id";
    //Omitir campos de auditoria:
    public $timestamps = false;
    use HasFactory;

    //Relacion entre continente y region
    public function regiones(){
        return $this->hasMany(Region::class, 
                              'continent_id');
    }

    //relacion ente continente y paises
    public function paises(){
        return $this->hasManyThrough(Region::class, 
                                     Country::class,
                                     'continent_id',
                                     'region_id');
    }

}
