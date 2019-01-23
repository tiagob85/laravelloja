@extends('template.edit')

@section('contentdepartamento')
<div class="col-col-md-12">
    <h3>Exclusão de registro</h3>
</div>
<div class="col-md-6 well">
    <div class="col-md-12">
        <h3>Deseja excluir o registro ?</h3>
        <div style="float: right">
            <a class="btn btn-default" href="{{url("loja")}}">
                <i class="glyphicon glyphicon-chevron-left ">
                    &nbsp;Cancelar
                </i>
            </a>        
            <a class="btn btn-danger" href="{{url("loja/$loja->id/destroy")}}">
                <i class="glyphicon glyphicon-remove">
                    &nbsp;Excluir
                </i>
            </a>
        </div>
    </div>
</div>
@endsection