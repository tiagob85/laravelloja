<?php

namespace App\Http\Controllers;

use App\Unidade;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class UnidadeController extends Controller
{
    //
    private $unidade;

    public function __construct()
    {
        $this->unidade = new Unidade();
    }

    public function index()
    {
        $list_unidade = Unidade::all();
        return view('loja.index', [
            'loja' => $list_unidade
        ]);
    }

    public function storeunidade(Request $request)
    {
        $validacao = $this->validacao($request->all());

        if($validacao->fails())
        {
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        $unidade = Unidade::create($request->all());
        return redirect("/loja")->with("message", "Unidade cadastrada com sucesso");
    }

    private function validacao($data)
    {
        $regras = [
            'simbolo' => 'required|min:2|max:2',
            'descricao' => 'required'
        ];

        $mensagens = [
            'simbolo.required' => 'Campo simbolo é obrigatório.',
            'simbolo.min' => 'Campo simbolo deve ter dois caracteres.',
            'simbolo.max' => 'Campo simbolo deve ter dois caracteres.',
            'descricao.required' => 'Campo descrição é obrigatório.'
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    public function editarUnidadeView($id)
    {
        return view('loja.editunidade', [
            'loja' => $this->getUnidade($id)
        ]);
    }

    protected function getUnidade($id)
    {
        return $this->unidade->find($id);
    }

    public function updateunidade(Request $request)
    {
        $unidade = $this->getUnidade($request->id);            
        $unidade->update($request->all());
        return redirect('/loja');
    }

    public function excluirUnidade($id)
    {
        $this->getUnidade($id)->delete();
        return redirect(url('loja'))->with('success', 'Registro excluido');
    }

}
