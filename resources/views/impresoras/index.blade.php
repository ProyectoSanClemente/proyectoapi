@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Impresoras</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('impresoras.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($impresoras->isEmpty())
                <div class="well text-center">No Impresoras found.</div>
            @else
                @include('impresoras.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $impresoras])


    </div>
@endsection
