@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Notices</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('noticias.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($notices->isEmpty())
                <div class="well text-center">No Notices found.</div>
            @else
                @include('noticias.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $notices])


    </div>
@endsection
