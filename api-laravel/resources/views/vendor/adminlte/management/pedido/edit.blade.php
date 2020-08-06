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
    <form role="form" id="quickForm" method="POST" action="{{ route('pedido.update',$pedido->id) }}">
    {{ csrf_field() }}
    {{method_field('PUT')}}
                <div class="card-body">
                <p><label for="exampleInput"> Codigo do Pedido: </label> {{$pedido->id}}</p>
                <p><label for="exampleInput"> Cliente: </label> {{$pedido->cliente->nome}}</p>
                    <ul>
                        @foreach ($pedido->produto as $produto)
                            <li>{{ $produto->nome }}</li>
                        
                        @endforeach
                    </ul>
 
                  <div class="row">
                        <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select" name="status">

                            <option value="" disabled selected>::Selecione::</option>
                                @foreach ($status as $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                @endforeach

                                 
                            </select>
                        </div>
                        </div>
                        </div>

                     
                </div>
                <!-- /.card-body -->
                 
                <a href="{{ route('pedido.index') }}" class="btn btn-default"> <i class="fa fa-arrow-left"></i>  Voltar</a>
                 
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