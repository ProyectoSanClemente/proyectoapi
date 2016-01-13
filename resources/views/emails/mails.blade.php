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
			{{"Driver: " . $mailboxmsginfo->Driver}}<br>
			{{"Mailbox: " . $mailboxmsginfo->Mailbox}}<br>
			{{"Total Mensajes: $mailboxmsginfo->Nmsgs | Sin Leer: $mailboxmsginfo->Unread | Recientes: $mailboxmsginfo->Recent | Eliminados: $mailboxmsginfo->Deleted"}}<br>
			{{"Tamaño buzón: " . $mailboxmsginfo->Size}}<br>
		@else
			{{"imap_mailboxmsginfo() failed: " .imap_last_error()}}
		@endif
	</div> {{-- End div row --}}

	@include('emails.table')
</div> {{-- End container --}}
@endsection