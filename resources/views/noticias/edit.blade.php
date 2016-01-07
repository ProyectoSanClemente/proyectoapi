@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($notice, ['route' => ['noticias.update', $notice->id], 'method' => 'patch']) !!}

        @include('noticias.fields')

    {!! Form::close() !!}
</div>
@endsection
