@extends('template.edit')

@section('contentdepartamento')
<div class="col-col-md-12">
    <h3>Editar departamento</h3>
</div>
<div class="col-md-12 well" style="width: 960px; font-size: 15px;">
    <form class="col-md-12" style="width: 960px;" action="{{ url('/loja/updatedepartamento') }}" method="POST">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$loja->id}}" >
        <div class="form-group col-md-12 {{$errors->has('nome') ? 'has->error' : ''}} ">
            <label  class="control-label">Nome :</label>
            <input type="text" name="nome" value="{{ $loja->nome }}" style="font-size: 15px;" class="form-control" size="150" placeholder="Nome.." required />
            @if($errors->has('nome'))
                <span class="help-block alert">
                    {{ $errors->first('nome')}}
                </span>
            @endif            
        </div>
        <div class="form-group col-md-8 {{$errors->has('descricao') ? 'has->error' : ''}} ">
            <label  class="control-label">Descrição :</label>
            <input type="text" name="descricao" value="{{ $loja->descricao }}"  style="font-size: 15px;" class="form-control" placeholder="Descrição..." />
            @if($errors->has('descricao'))
                <span class="help-block alert">
                    {{ $errors->first('descricao')}}
                </span>
            @endif            
        </div>       
        <div class="from-group col-md-4 {{$errors->has('tag') ? 'has->error' : ''}} " > 
            <label  class="control-label">Tag :</label>
            <input type="text" name="tag" value="{{ $loja->tag }}"  style="font-size: 15px;" maxlength="10" class="form-control" placeholder="Tag" /> 
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