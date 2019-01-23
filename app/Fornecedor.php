<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $fillable = [
        'id',
        'cnpj',
        'razaosocial',
        'nomefantasia',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'telefone',
        'celular',
        'representante',
        'telrepresentante',
        'observacao'
    ];

    protected $table = "fornecedor";
}
