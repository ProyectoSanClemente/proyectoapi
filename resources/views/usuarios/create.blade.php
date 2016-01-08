@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'usuarios.store','files'=> true]) !!}

        @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
