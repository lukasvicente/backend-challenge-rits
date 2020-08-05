@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
     
@stop

@section('content')

  
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulario de Usuario</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
    <form role="form" id="quickForm" method="POST" action="{{ route('users.update',$user->id) }}">
    {{ csrf_field() }}
    {{method_field('PUT')}}
                <div class="card-body">
                <div class="form-group col-md-8 {{ $errors->has('name') ? ' error' : '' }}">
                    <label for="exampleInputEmail1">Name</label>
                    <input required type="name" name="name" class="form-control" id="exampleInputname" placeholder="Enter Name"
                    value="{{$user->name}}">
                  </div>
                  @if ($errors->has('email'))
                        <label id="email-error" class="error" for="email">{{ $errors->first('name') }}</label>
                    @endif
                  <div class="form-group col-md-8 {{ $errors->has('email') ? ' error' : '' }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input required type="email" name="email" class="form-control" id="exampleInputEmail1" 
                    placeholder="Enter email" value="{{$user->email}}">
                   
                  </div>                   
                   
                </div>
                <!-- /.card-body -->
                 
                <a href="{{route('users.index')}}" class="btn btn-default"> <i class="fa fa-arrow-left"></i>  Voltar</a>
                 
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"> </i> Salvar</button>
                 
              </form>
    </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
<!-- page script -->
@section('plugins.Datatables', true)
 
@stop