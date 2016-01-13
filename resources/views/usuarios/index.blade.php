@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        
        <div class="row">
            <h1 class="pull-left">Usuarios</h1>
             <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuarios.create') !!}">  Añadir Nuevo Usuario<span class="glyphicon glyphicon-plus"></span></a>
        </div>

        <div class="row">
            @if($usuarios->isEmpty())
                <div class="well text-center">Usuarios No Encontrados.</div>
            @else
                @include('usuarios.table')
            @endif
        </div>
        @include('common.paginate', ['records' => $usuarios])


    </div>
@endsection
