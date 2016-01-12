@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        
        <div class="row">
            <h1 class="pull-left">Correos</h1>
            </div>
           <div class="row">
             <a class="btn btn-primary" style="margin-top: 25px" href="{{ URL::to('emails/mails') }}">  Bandeja de entrada<span class="glyphicon"></span></a>
        </div>

        <div class="row">

        </div>


    </div>
@endsection
