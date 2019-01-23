<?php

namespace App\Http\Controllers;

use App\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;
    //
    public function index()
    {
        $list_produtos = Produto::all();   
    }

    public function storeproduto(Request $request)
    {
        $departamento = Produto::create($request->all());
        return redirect("/loja")->with("message", "Produto cadastrado com sucesso !");
    }
}
