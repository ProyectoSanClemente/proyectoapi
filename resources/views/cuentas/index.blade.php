@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Cuentas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('cuentas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($cuentas->isEmpty())
                <div class="well text-center">No Cuentas found.</div>
            @else
                @include('cuentas.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $cuentas])


    </div>
@endsection
