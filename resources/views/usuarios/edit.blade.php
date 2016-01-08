@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')

    {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'patch','files'=> true]) !!}

        @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
