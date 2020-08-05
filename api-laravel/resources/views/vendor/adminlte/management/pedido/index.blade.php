@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
     
@stop

@section('content')


 
<div class="card">
    <div class="card-header">
    <h3>Listagem dos Pedidos</h3>
    </div>
               
              <!-- /.card-header -->
    <div class="card-body">
    
        <table id="example1" class="table table-bordered table-striped" id="data-table"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="width: 100px;">Ações</th>
                <th>Codigo do Pedido</th>
                <th>Cliente</th>
                <th>Status</th>
                 
                
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                <td>
                        <a href="{{route('pedido.edit',$pedido->id)}}" class="btn btn-info btn-sm"
                            data-toggle="tooltip"
                            data-container="body"
                            title="Ver">
                                <span class="label label-warning"><i class="fa fa-search"></i></span>
                        </a>
                        
                     
                    </td>
                    
                    <td style="width: 25%;" > {{$pedido->id}}</td>
                    <td> {{$pedido->cliente->nome}}</td>
                    <td>

                    @if($pedido->status == 'pendente')
                        <span class="badge badge-warning">
                            {{$pedido->status}}
                        </span> 
                    @elseif($pedido->status == 'em preparo')
                        <span class="badge badge-warning">
                            {{$pedido->status}}
                        </span> 
                    @elseif($pedido->status == 'em entrega')
                        <span class="badge badge-info">
                            {{$pedido->status}}
                        </span> 
                    @elseif($pedido->status == 'entregue')
                        <span class="badge badge-success">
                            {{$pedido->status}}
                        </span> 
                    @elseif($pedido->status == 'cancelado')
                        <span class="badge badge-danger">
                            {{$pedido->status}}
                        </span> 
                    @else

                        {{$pedido->status}}

                    @endif

                    </td>
                    
                   
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
 

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action="#" method="POST" class="remove-record-model">
                
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Deseja deletar o registro?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-primary">Sim</button>
            </div>
            </form>
          </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
<!--  page script -->
@section('plugins.Datatables', true)

<script>

$(document).on('click','.deleteProduto',function(){
    var userID = $(this).attr('data-value');

});

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      "order": [[ 3, 'desc' ]],
    });
  });
</script>
@stop