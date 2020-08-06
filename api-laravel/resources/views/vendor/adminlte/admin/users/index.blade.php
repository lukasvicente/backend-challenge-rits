@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
     <h1>Listagem de Usuarios</h1>
@stop

@section('content')


 
<div class="card">
    <div class="card-header">
               
        <div class="col-md-2">
            <a href="{{route('users.create')}}" class="btn btn-block btn-outline-primary"><i class="fa fa-plus"> </i> Novo Usuario</a>
        </div>
    </div>
               
              <!-- /.card-header -->
    <div class="card-body">
    
        <table id="example1" class="table table-bordered table-striped" id="data-table"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="width: 100px;">Ações</th>
                <th>Nome</th>
                <th>Email</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-sm"
                            data-toggle="tooltip"
                            data-container="body"
                            title="Editar">
                                <span class="label label-warning"><i class="fa fa-edit"></i></span>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default"
                            data-toggle="tooltip"
                            data-container="body"
                            title="Deletar">
                                <span class="label label-warning"><i class="fa fa-trash"></i></span>
                        </a>
                     
                    </td>

                    <td> {{$user->name}} </td>
                    <td> {{$user->email}}</td>
                   
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
 

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
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
              <button type="button" class="btn btn-primary">Sim</button>
            </div>
          </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
<!-- page script -->
@section('plugins.Datatables', true)

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      
    });
  });
</script>
@stop