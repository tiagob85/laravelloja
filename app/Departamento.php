<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'tag'
    ];

    protected $table = 'departamento';

}
