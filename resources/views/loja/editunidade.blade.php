@extends('template.edit')

@section('contentdepartamento')
<div class="col-md-12 well" style="width: 960px; font-size: 15px;">    
    <form name="formunidade"  class="col-md-12" style="width: 960px;" action="{{ url('/loja/updateunidade') }}" method="POST" >
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{$loja->id}}">
        <table>
            <tr>
                <td>
                    <div id="field">Simbolo : </div>
                    <input style="font-size: 16px" type="text" value="{{$loja->simbolo}}" size="80" maxlength="80" name="simbolo"  placeholder="Simbolo" >
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
                        <input style="font-size: 16px" type="text" size="45" value="{{$loja->descricao}}" maxlength="45" name="descricao" placeholder="Descrição">
                        @if($errors->has('descricao'))
                            <span class="help-block alert">
                                {{$errors->first('descricao')}}
                            </span>
                        @endif
                    </td>
                </tr>
        </table>        
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-default" style="float:right;background-color:blue; color:black; width:250px;font-size: 15px;">Gravar</button>
        </div>             
    </form> 
</div> 
@endsection