@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
     
@stop

@section('content')


 
<div class="card">
    <div class="card-header">
    <h3>Listagem de Clientes</h3>
    </div>
               
              <!-- /.card-header -->
    <div class="card-body">
    
        <table id="example1" class="table table-bordered table-striped" id="data-table"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                 
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->email}} </td>
                    <td>{{$cliente->telefone}} </td>
                    <td>{{$cliente->endereco}} </td>
                   
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
      
    });
  });
</script>
@stop