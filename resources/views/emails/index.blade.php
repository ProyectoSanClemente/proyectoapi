@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')
        
        <div class="row">
            <h1 class="pull-left">Correos</h1>
        </div>

            <div class="row"> 
        @if ($mailboxmsginfo) 
            {{"Fecha:".$mailboxmsginfo->Date }}<br>
            {{"Total Mensajes: $mailboxmsginfo->Nmsgs | Sin Leer: $mailboxmsginfo->Unread | Recientes: $mailboxmsginfo->Recent | Eliminados: $mailboxmsginfo->Deleted"}}<br>
        @else
            {{"imap_mailboxmsginfo() failed: " .imap_last_error()}}
        @endif
    </div> {{-- End div row --}}
        <div class="row">
            <a class="btn btn-primary" style="margin-top: 25px" href="{{ URL::to('emails/mails') }}">Bandeja de entrada {{$mailboxmsginfo->Nmsgs}} <span class="glyphicon glyphicon-inbox"></span></a>
        </div>
        <div class="row">
            <a class="btn btn-primary" style="margin-top: 25px" href="{{ URL::to('emails/unseen') }}">No vistos {{$mailboxmsginfo->Unread}} </a>
        </div>

        <div class="row">

        </div>


    </div>
@endsection
