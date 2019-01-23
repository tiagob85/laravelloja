<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Unidade;
use App\Produto;
Use App\Fornecedor;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    private $departamento;

    public function __construct()
    {
        $this->departamento = new Departamento();
    }
    //
    public function index()
    {
        $list_departamento = Departamento::all();
        $list_unidade = Unidade::all();
        $list_produto = Produto::all();
        $list_fornecedor = Fornecedor::all();
        return view('loja.index', [
            'loja' => $list_departamento, 'loja1' => $list_unidade, 'loja2' => $list_produto, 'loja3' => $list_fornecedor
        ]);
    }

    public function storedepartamento(Request $request)
    {
        $validacao = $this->validacao($request->all());

        if($validacao->fails())
        {
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        $departamento = Departamento::create($request->all());
        return redirect("/loja")->with("message", "Departamento criado com sucesso !");
    }

    public function validacao($data)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required',
            'tag' => 'required'
        ];

        $mensagens = [
            'nome.required' => 'Campo nome é obrigatório.',
            'descricao.required' => 'Campo descrição é obrigatório.',
            'tag.required' => 'Campo tag é obrigatório.'
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    public function editarDepartamentoView($id)
    {
        return view('loja.editdepartamento',[
            'loja' => $this->getDepartamento($id)
        ]);
    }

    protected function getDepartamento($id)
    {
        return $this->departamento->find($id);
    }

    public function updatedepartamento(Request $request)
    {   
        $departamento = $this->getDepartamento($request->id);
        $departamento->update($request->all());
        return redirect('/loja');
    }

    public function excluirDepartamento($id)
    {
        $this->getDepartamento($id)->delete();
        return redirect(url('loja'))->with('success', 'Registro excluido');
    }

}
