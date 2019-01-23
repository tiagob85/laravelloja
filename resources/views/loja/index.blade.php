@extends('template.admin')

@section('contentprodutos')
<h1>Cadastro de produtos</h1>
<form name="formproduto" action="{{ url('/loja/storeproduto') }}" method="POST">
{{csrf_field()}}
        <table>
            <tr>
                <td>
                    <div id="field">Nome </div>
                    <input style="font-size: 16px" type="text" size="83" maxlength="80" name="nome"  placeholder="Nome do produto" required>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="field">Nome de exibição </div>
                    <input style="font-size: 16px" type="text" name="nomeexibicao" size="83" maxlength="80" placeholder="Nome de exibição" required>
                </td>
            </tr>         
            <tr>
                <td>
                    <div id="field">Descrição </div>
                    <input style="font-size: 16px" type="text" name="descricao" size="83" maxlength="80" placeholder="Descrição do produto" required>
                </td>    
            </tr>    
            <tr>
                <td>
                    <div id="field">
                        Peso : <input style="font-size: 16px" type="text" name="peso" size="10" maxlength="10" placeholder="0.00" required>
                        Unidade Compra :
                        <select id="field" name="unidadecompra">
                            <option value="selecione" selected>Selecione</option>
                            @foreach($loja1 as $unidade)
                            <!-- <option value="selecione" selected>Selecione</option>
                            <option value="pc">Peça</option>
                            <option value="unidade">Unidade</option>
                            <option value="kg">KG</option>
                            <option value="lt">Litros</option> -->
                                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option><br>
                            @endforeach 
                        </select>   
                        Unidade Venda :
                            <select id="field" name="unidadevenda">
                            <option value="selecione" selected>Selecione</option>
                            @foreach($loja1 as $unidade)
                                <!--<option value="selecione" selected>Selecione</option>
                                <option value="pc">Peça</option>
                                <option value="unidade">Unidade</option>
                                <option value="kg">KG</option>-->
                                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option><br>
                            @endforeach  
                            </select>     
                    </div>                                           
                </td>
            </tr>          
            <tr>                                        
                <td>
                    <div id="field">
                        Preço : 
                        <input style="font-size: 16px" type="text" name="preco" size="13" maxlength="13" placeholder="0.00" required>
                        Preço Promocional :
                        <input style="font-size: 16px" type="text" name="precopromocional" size="13" maxlength="13" placeholder="0.00" required>
                    </div>    
                </td>        
            </tr>
            <tr>
                <td>
                    <div id="field">
                        Produto ativo ? 
                        <select id="field" name="ativo">
                            <option value="-1" selected>Selecione</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>    
                </td>        
            </tr>
            <tr>                                        
                <td>
                    <div id="field">
                        Estoque :
                        <input style="font-size: 16px" type="text" name="estoque" size="13" maxlength="13" placeholder="0" required>
                    </div>     
                    <div id="field">
                        Imagem do produto :
                                <input style="font-size: 16px" type="file" name="imagemproduto" size="50" maxlength="50" placeholder="Imagem do produto"> 
                    </div>   
                </td>                                        
            </tr>
            <tr>
                <td>
                    <div id="field">
                        Fornecedor
                            <select id="field" name="codfornecedor">
                                <option value="-1" selected>Selecione</option>
                                <option value="1">Fornecedor 1</option>
                                <option value="2">Fornecedor 2</option>
                            </select>
                            
                    </div>
                </td>    
                <td>
                    <div id="field">
                        Departamento
                            <select id="field" name="coddepartamento">
                                <option value="-1" selected>Selecione</option>
                                <option value="1">Departamento 1</option>
                                <option value="2">Departamento 2</option>
                            </select>
                            
                    </div>
                </td>                    
            </tr>
        </table>
        <input class="btn" type="submit" value="Gravar informações" onclick="validaformulario()">
        <input class="btn" type="submit" value="Visualizar informações">
    </form> 
@endsection

@section('contentdepartamento')    
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Tag</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($loja as $Departamento)
                <tr>
                    <td>{{$Departamento->id}}</td>
                    <td>{{$Departamento->nome}}</td>
                    <td>{{$Departamento->descricao}}</td>
                    <td>{{$Departamento->tag}}</td>
                    <td><a href="{{ url("/loja/$Departamento->id/editdepartamento") }}"><button>Editar</button></a></td>
                    <td><a href="{{ url("/loja/$Departamento->id/deletedepartamento")}}"><button>Excluir</button></a></td>             
                </tr>
            <br>
        @endforeach      
    </tbody>
</table>

<div class="col-md-12 well" style="width: 960px; font-size: 15px;">
    <form class="col-md-12" style="width: 960px;" action="{{ url('/loja/storedepartamento') }}" method="POST">
    {{csrf_field()}}
        <div class="form-group col-md-12 {{$errors->has('ddd') ? 'has->error' : ''}} ">
            <label  class="control-label">Nome :</label>
            <input type="text" name="nome" style="font-size: 15px;" class="form-control" size="150" placeholder="Nome.." required />
            @if($errors->has('nome'))
                <span class="help-block alert">
                    {{ $errors->first('nome')}}
                </span>
            @endif            
        </div>
        <div class="form-group col-md-8 {{$errors->has('ddd') ? 'has->error' : ''}} ">
            <label  class="control-label">Descrição :</label>
            <input type="text" name="descricao" style="font-size: 15px;" class="form-control" placeholder="Descrição..." />
            @if($errors->has('descricao'))
                <span class="help-block alert">
                    {{ $errors->first('descricao')}}
                </span>
            @endif            
        </div>       
        <div class="from-group col-md-4 {{$errors->has('ddd') ? 'has->error' : ''}} " > 
            <label  class="control-label">Tag :</label>
            <input type="text" name="tag" style="font-size: 15px;" maxlength="10" class="form-control" placeholder="Tag" /> 
            @if($errors->has('tag'))
                <span class="help-block alert">
                    {{ $errors->first('tag')}}
                </span>
            @endif            
        </div>                               
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-default" style="float:right;background-color:blue; color:black; width:250px;font-size: 15px;">Gravar</button>
        </div> 
    </form>     
</div>  
<br>                                                   
@endsection   

@section('contentfornecedor')
<h1>Cadastro de fornecedores</h1>  
<div style="overflow: auto; width: 850px">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Codigo</th>
                <th>Razão Social</th>
                <th>Nome fantasia</th>
                <th>Endereço</th>
                <th>Numero</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Telefone</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($loja3 as $Fornecedor)
                    <tr>
                        <td>{{$Fornecedor->id}}</td>
                        <td>{{$Fornecedor->razaosocial}}</td>
                        <td>{{$Fornecedor->nomefantasia}}</td>
                        <td>{{$Fornecedor->endereco}}</td>
                        <td>{{$Fornecedor->numero}}</td>
                        <td>{{$Fornecedor->bairro}}</td>
                        <td>{{$Fornecedor->cidade}}</td>
                        <td>{{$Fornecedor->estado}}</td>
                        <td>{{$Fornecedor->cep}}</td>
                        <td>{{$Fornecedor->telefone}}</td>
                        <td>{{$Fornecedor->celular}}</td>
                        <td>{{$Fornecedor->representante}}</td>
                        <td>{{$Fornecedor->telrepresentante}}</td>
                        <td>{{$Fornecedor->observacao}}</td>
                        <td><a href="{{ url("/loja/$Fornecedor->id/editfornecedor") }}"><button>Editar</button></a></td>
                        <td><a href="{{ url("/loja/$Fornecedor->id/deletefornecedor")}}"><button>Excluir</button></a></td>             
                    </tr>
                <br>
            @endforeach      
        </tbody>
    </table>
</div>    
<div class="col-md-12 well" style="width: 960px; font-size: 15px;"> 
    <form name="formfornecedor" action="{{ url('/loja/storefornecedor') }}" method="POST" >
    {{csrf_field()}}
        <div id="field">CNPJ </div>
        <input style="font-size: 16px" type="text" size="15" maxlength="15" name="cnpj"  placeholder="CNPJ" > 
        @if($errors->has('cnpj'))
            <span class="help-block alert">
                {{ $errors->first('cnpj')}}
            </span>
        @endif        
        <div id="field">Razão social </div>
        <input style="font-size: 16px" type="text" size="80" maxlength="80" name="razaosocial"  placeholder="Razão social" > 
        @if($errors->has('razaosocial'))
            <span class="help-block alert">
                {{ $errors->first('razaosocial')}}
            </span>
        @endif
        <div id="field">Nome fantasia </div>
        <input style="font-size: 16px" type="text" size="100" maxlength="100" name="nomefantasia"  placeholder="Nome fantasia" >   
        @if($errors->has('nomefantasia'))
            <span class="help-block alert">
                {{ $errors->first('nomefantasia')}}
            </span>
        @endif
        <table>                                                        
            <tr>
                <td><div id="field">Endereço:</td>
                <td>
                    <input style="font-size: 16px" type="text" size="60" maxlength="60" name="endereco"  placeholder="Endereço" >
                    @if($errors->has('endereco'))
                    <span class="help-block alert">
                        {{ $errors->first('endereco')}}
                    </span>
                    @endif
                </td>                                        

                <td><div id="fieldesq">Numero:</div></td>
                <td>
                    <input style="font-size: 16px" type="text" size="10" maxlength="10" name="numero" placeholder="Numero" >
                    @if($errors->has('numero'))
                    <span class="help-block alert">
                        {{ $errors->first('numero')}}
                    </span>
                    @endif                    
                </td>
            </tr>           
            <tr>
                <td><div id="fieldesq">Bairro:</div></td> 
                <td>
                    <input style="font-size: 16px" type="text" size="60" maxlength="60" name="bairro"  placeholder="Bairro" >
                    @if($errors->has('bairro'))
                    <span class="help-block alert">
                        {{ $errors->first('bairro')}}
                    </span>
                    @endif                    
                </td>  
                <td> <div id="fieldesq">CEP :</div></td> 
                <td>
                    <input style="font-size: 16px" type="text" size="8" maxlength="8" name="cep" placeholder="CEP" >
                    @if($errors->has('cep'))
                    <span class="help-block alert">
                        {{ $errors->first('cep')}}
                    </span>
                    @endif
                </td> 
            </tr>               
            <tr>
                <td><div id="fieldesq">Cidade :</div></td>                                        
                <td>
                    <input style="font-size: 16px" type="text" size="60" maxlength="60" name="cidade"  placeholder="Cidade" >
                    @if($errors->has('cidade'))
                    <span class="help-block alert">
                        {{ $errors->first('cidade')}}
                    </span>
                    @endif
                </td>
                <td><div id="fieldesq">Estado :</div></td>
                <td>
                    <select id="field" name="estado">
                        <option value="-1" selected>Selecione</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PR">Paraná</option>
                    </select> 
                </td>                                    
            </tr>        
            <tr>
                <td>
                    <div id="field">
                    Telefone :
                    </div>
                </td>
                <td>
                    <input style="font-size: 16px" type="text" size="10" maxlength="10" name="telefone"  placeholder="Telefone" >
                    @if($errors->has('telefone'))
                    <span class="help-block alert">
                        {{ $errors->first('telefone')}}
                    </span>
                    @endif
                </td>        
                <td>
                    <div id="fieldesq">Celular :</div>
                </td>
                <td>
                    <input style="font-size: 16px" type="text" size="11" maxlength="11" name="celular"  placeholder="Celular" >                                        
                    @if($errors->has('celular'))
                    <span class="help-block alert">
                        {{ $errors->first('celular')}}
                    </span>
                    @endif
                </td>
            </tr>                                                                                                      
        </table>                                                     

        <div id="field">
            Representante :<br>
            <input style="font-size: 16px" type="text" size="70" maxlength="70" name="representante"  placeholder="Representante" >
            @if($errors->has('representante'))
                    <span class="help-block alert">
                        {{ $errors->first('representante')}}
                    </span>
            @endif
            Telefone :
            <input style="font-size: 16px" type="text" size="11" maxlength="11" name="telrepresentante" placeholder="Telefone" >
            @if($errors->has('telrepresentante'))
                    <span class="help-block alert">
                        {{ $errors->first('telrepresentante')}}
                    </span>
            @endif
        </div>
            <div id="field">
                Observação :
            <input style="font-size: 16px" type="text" size="90" maxlength="90" name="observacao" placeholder="Observação" >                                    
            @if($errors->has('observacao'))
                <span class="help-block alert">
                    {{ $errors->first('observacao')}}
                </span>
            @endif
        </div>

        <div class="col-sm-offset-6 col-sm-6">
            <a href="href="{{ url("/loja/$unidade->id/editunidade") }}"><button type="submit" class="btn btn-default" style="float:right;background-color:blue; color:black; width:250px;font-size: 15px;">Gravar</button></a>
        </div>                          
    </form>
</div>
@endsection

@section('contentunidade')
    <h1>Cadastro de Unidade</h1>
    <button class="open-button" onclick="openForm()">Novo</button>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">    
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Codigo</th>
            <th>Simbolo</th>
            <th>Descrição</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($loja1 as $unidade)
                <tr>
                    <td>{{$unidade->id}}</td>
                    <td>{{$unidade->simbolo}}</td>
                    <td>{{$unidade->descricao}}</td>                    
                    <td><a href="{{ url("/loja/$unidade->id/editunidade") }}"><button>Editar</button></a></td>
                    <td><a href="{{ url("/loja/$unidade->id/deleteunidade")}}"><button>Excluir</button></a></td>             
                </tr>
            <br>
        @endforeach      
    </tbody>
</table>      
    <br><br>
<div class="col-md-12 well" id="formunidade" style="width: 960px; font-size: 15px;" >    
    <form name="formunidade"  class="col-md-12" style="width: 960px;" action="{{ url('/loja/storeunidade') }}" method="POST" >
    {{csrf_field()}}
        <table>
            <tr>
                <td>
                    <div id="field">Simbolo : </div>
                    <input style="font-size: 16px" type="text" size="80" maxlength="80" name="simbolo"  placeholder="Nome do departamento" >
                    @if($errors->has('simbolo'))
                        <span class="help-block alert">
                            {{ $errors->first('simbolo')}}
                        </span>
                    @endif
                </td>
                </tr>                                
                <tr>
                    <td>
                        <div id="field">Descrição</div>
                        <input style="font-size: 16px" type="text" size="45" maxlength="45" name="descricao" placeholder="Descrição">
                        @if($errors->has('descricao'))
                            <span class="help-block alert">
                                {{$errors->first('descricao')}}
                            </span>
                        @endif
                    </td>
                </tr>
        </table>        
        <div class="col-sm-offset-6 col-sm-6">
            <a href="href="{{ url("/loja/$unidade->id/editunidade") }}"><button type="submit" class="btn btn-default" style="float:right;background-color:blue; color:black; width:250px;font-size: 15px;">Gravar</button></a>
        </div>             
    </form> 

    <div class="form-popup" id="myForm">
        <form name="formunidade" action="{{ url('/loja/storeunidade') }}" method="POST" class="form-container">
            {{csrf_field()}}        
            <label for="simbolo"><b>Simbolo : </b></label>
            <input style="font-size: 16px" type="text" size="4" maxlength="2" name="simbolo"  placeholder="Simbolo" >
                @if($errors->has('simbolo'))
                    <span class="help-block alert">
                        {{ $errors->first('simbolo')}}
                    </span>
                @endif        
            <label for="descricao"><b>Descrição : </b></label>            
            <input style="font-size: 16px" type="text" size="45" maxlength="45" name="descricao" placeholder="Descrição">
                @if($errors->has('descricao'))
                    <span class="help-block alert">
                        {$errors->first('descricao')}}
                    </span>
                @endif            
        </form>
    </div>
</div>    
@endsection
