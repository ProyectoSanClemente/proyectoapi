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

	<table class="table">
	    <thead>
	    	<th>Mensaje</th>
	        <th>Remitente</th>
	        <th>Asunto</th>
	        <th>Tamaño</th>
	        <th>Fecha</th>
	        <th>Leido</th>
	        <th>Leer</th>
		</thead>

		@foreach ($mailsinfo as $mail)
			<tr>
				<td>{!! $mail->msgno !!}</td>
				<td>{!! $mail->from 	 !!}</td>
				<td>{!! $mail->subject !!}</td>
				<td>{!! $mail->size.' bytes'!!}</td>
				<td>{!! $mail->date!!}</td>
				@if($mail->seen == "0")
					<td><b>Sin leer</b></td>
				@else
					<td>Leido</td>
				@endif
				<td>{!! $mail->msgno !!}</td>

			</tr>

		@endforeach
	</table>
</div> {{-- End container --}}
@endsection