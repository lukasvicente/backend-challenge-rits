@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
     
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
</div>
 
@endif
                

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulario de Produto</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
    <form role="form" id="quickForm" method="POST" action="{{ route('produto.store') }}">
    {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group col-md-6 {{ $errors->has('nome') ? ' error' : '' }}">
                      <label for="exampleInputEmail1">Nome</label>
                      <input required type="text" name="nome" class="form-control" id="exampleInputname" placeholder="Ex.: Cachorro Quente"
                      value="{{old('nome')}}">
                    </div>
                    
                  
                    <label for="exampleInputEmail1">Preço</label>
                    <div class="form-group col-md-2 {{ $errors->has('preco') ? ' error' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                          </div>
                        
                          <input required type="text" name="preco" class="form-control" 
                          placeholder="Ex: 23.00" value="{{old('preco')}}">
                        </div>
                    </div>
                    
                </div> 
                 
                <a href="{{route('produto.index')}}" class="btn btn-default"> <i class="fa fa-arrow-left"></i>  Voltar</a>
                 
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"> </i> Salvar</button>
                 
              </form>
    </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
<!-- page script -->
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@stop