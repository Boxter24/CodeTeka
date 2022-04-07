<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = [
        'nombre_programa', 'categoria' , 'subcategoria' , 'framework_lenguaje' , 'foto_programa', 'enlace'];
}
