<?php

namespace App\Http\Controllers;

use App\Fornecedor;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class FornecedorController extends Controller
{
    //
    private $fornecedor;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
    }

    public function index()
    {
        $list_fornecedor = Fornecedor::all();
        return view('loja.index', [
            'loja' => $list_fornecedor
        ]);
    }

    public function storefornecedor(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if($validacao->fails())
        {
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }        
        $fornecedor = Fornecedor::create($request->all());
        return redirect("/loja")->with("message", "Fornecedor cadastrado com sucesso !");
    }

    public function validacao($data)
    {
        $regras = [
            'cnpj' => 'required|size:14',
            'razaosocial' => 'required|min:3',
            'nomefantasia' => 'required|min:3',
            'endereco' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required|size:8',
            'telefone' => 'required',
            'celular' => 'required|size:11',
            'representante' => 'required',
            'telrepresentante' => 'required|min:10|max:11',
            'observacao' => 'required'            
        ];

        $mensagens = [
            'cnpj.required' => 'Campo cnpj é obrigatório.',
            'cnpj.size' => 'Campo cnpj deve ter quartorze digitos.',
            'razaosocial.required' => 'Campo Razão social é obrigatório',
            'razaosocial.min' => 'O campo deve ter ao menos tres caracteres',
            'nomefantasia.required' => 'campo nome fantasia é obrigatório',
            'nomefantasia.min' => 'O campo deve ter ao menos tres caracteres',
            'endereco.required' => 'Campo endereço é obrigatorio.',
            'numero.required' => 'Campo numero é obrigatorio.',
            'bairro.required' => 'Campo bairro é obrigatorio.',
            'cidade.required' => 'Campo cidade é obrigatorio.',
            'estado.required' => 'Campo estado é obrigatorio.',
            'cep.required' => 'Campo cep é obrigatório',
            'cep.size' => 'O campo deve ter oito de caracteres.',
            'telefone.required' => 'Campo telefone é obrigatorio.',
            'celular.required' => 'Campo celular é obrigatorio.',
            'celular.size' => 'O campo celular deve ter onze caracteres',
            'representante.required' => 'Campo representante é obrigatorio',
            'telrepresentante.required' => 'Campo telefone representante é obrigatório',
            'telrepresentante.size' => 'O campo deve ter entre 11 ou 10 caracteres',
            'observacao.required' => 'Campo observação é obrigatório'
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    public function editarFornecedorView($id)
    {
        return view('loja.editfornecedor',[
            'loja' => $this->getFornecedor($id)
        ]);
    }

    protected function getFornecedor($id)
    {
        return $this->fornecedor->find($id);
    }

    public function updatefornecedor(Request $request)
    {
        $fornecedor = $this->getFornecedor($request->id);
        $fornecedor->update($request->all());
        return redirect('/loja');
    }

    public function excluirFornecedor($id)
    {
        $this->getFornecedor($id)->delete();
        return redirect(url('loja'))->with('sucess', 'Registro excluido');
    }

}
