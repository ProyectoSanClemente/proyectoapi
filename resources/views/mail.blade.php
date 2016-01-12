@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	<h1 class="pull-left">Correos</h1>
	</div>

	<div class="row"> 
		@if ($check)
			{{"Fecha:".$check->Date }}<br>
			{{"Driver: " . $check->Driver}}<br>
			{{"Mailbox: " . $check->Mailbox}}<br>
			{{"Total Mensajes: $check->Nmsgs | Sin Leer: $check->Unread | Recientes: $check->Recent | Eliminados: $check->Deleted"}}<br>
			{{"Tamaño buzón: " . $check->Size}}
		@else
			{{"imap_check() failed: " .imap_last_error()}}
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
		</thead>

		@foreach ($resultados as $detalles)


			<tr>
				{{-- // Ponemos 'Sin asunto' en caso que no tenga. --}}
				@if ($detalles->subject == '')
					{{	$subject='Sin asunto'}}
				@else
					{{$subject =imap_utf8($detalles->subject)}}
				@endif

				{{$from = utf8_decode(imap_utf8($detalles->from))}}

				<td>{!! $detalles->msgno !!}</td>
				<td>{!! $from !!}</td>
				<td>{{ $subject }}</td>
				<td>{!! $detalles->size.' bytes'!!}</td>
				<td>{!! $detalles->date!!}</td>

				@if($detalles->seen == "0")
					<td><b>Sin leer</b></td>
					{{$cont = $cont + 1}}
				@else
					<td>Leido</td>
				@endif

			</tr>
		@endforeach
	</table>

		<?php
		imap_close($imap);
		?>

</div> {{-- End container --}}
@endsection