<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = [
        'id',
        'nome',
        'nomeexibicao',
        'descricao',
        'peso',
        'unidadecompra',
        'unidadevenda',
        'preco',
        'precopromocional',
        'ativo',
        'estoque',
        'imagemproduto',
        'codfornecedor',
        'coddepartamento'
    ];

    protected $table = 'produto';
}
