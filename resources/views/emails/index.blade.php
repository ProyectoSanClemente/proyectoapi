@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')
        
        <div class="row">
            <h1 class="pull-left">Correos</h1>
        </div>
        <div class="row">
            <h3>Estado</h3>
            @if ($mailboxmsginfo) 
                {{"Fecha:".$mailboxmsginfo->Date }}<br>
                {{"Total Mensajes: $mailboxmsginfo->Nmsgs | Sin Leer: $mailboxmsginfo->Unread | Recientes: $mailboxmsginfo->Recent | Eliminados: $mailboxmsginfo->Deleted"}}<br>
            @else
                {{"imap_mailboxmsginfo() failed: " .imap_last_error()}}
            @endif
        </div> {{-- End div row --}}
        
        @include('emails.sidebar')
        
    </div>
@endsection
        
