@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
     <h1>Listagem de Produtos</h1>
@stop

@section('content')


 
<div class="card">
    <div class="card-header">
               
        <div class="col-md-2">
            <a href="{{route('produto.create')}}" class="btn btn-block btn-outline-primary"><i class="fa fa-plus"> </i> Novo Produto</a>
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
                <th>Preço</th>
                
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>
                    

                        <a href="{{route('produto.edit',$produto->id)}}" class="btn btn-info btn-sm"
                            data-toggle="tooltip"
                            data-container="body"
                            title="Editar">
                                <span class="label label-warning"><i class="fa fa-edit"></i></span>
                        </a>
                        <a 
                        class="btn btn-danger btn-sm" 
                          data-value="{{$produto->id}}"
                          href="javascript:;" 
                          onclick="deleteData({{$produto->id}})"
                          data-toggle="modal" 
                          data-target="#modal-default"
                          data-toggle="tooltip"
                          data-container="body"
                          title="Deletar"
                          name="delete"
                          id="delete"
                           
                        >
                          <span class="label label-warning"><i class="fa fa-trash"></i></span>
                        </a>
                     
                    </td>

                    <td> {{$produto->nome}} </td>
                    <td>{{  'R$ '.number_format($produto->preco, 2, ',', '.') }}  </td>
                   
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
 

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
          <form action=""  id="deleteForm" method="POST" class="remove-record-model">
          {{ csrf_field() }}
               {{ method_field('delete') }}
              
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
              <button type="submit" class="btn btn-primary" onclick="formSubmit()">Sim</button>
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

function deleteData(id)
{
    var id = id;
    var url = '{{ route("produto.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
}

function formSubmit()
{
    $("#deleteForm").submit();
}

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
      "order": [[ 1, 'asc' ]],
      
    });
  });
</script>
@stop