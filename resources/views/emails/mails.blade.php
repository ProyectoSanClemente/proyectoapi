@extends('layouts.app')

@section('content')
<div class="container">

	@include('flash::message')

	<div class="row">
	<h1 class="pull-left">Correos</h1>
	</div>

	<div class="row"> 
		@if ($check)
			{{"Fecha:".$check->Date }}<br>
			{{"Driver: " . $check->Driver}}<br>
			{{"Mailbox: " . $check->Mailbox}}<br>
			{{"Total Mensajes: $check->Nmsgs | Sin Leer: $check->Unread | Recientes: $check->Recent | Eliminados: $check->Deleted"}}<br>
			{{"Tamaño buzón: " . $check->Size}}<br>
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
	        <th>Leer</th>
		</thead>

		@foreach ($resultados as $detalles)
			<tr>
				{{-- // Ponemos 'Sin asunto' en caso que no tenga. --}}
				@if ($detalles->subject == '')
					<?php	$subject='Sin asunto'; ?>
				@else

				<?php $subject =imap_utf8($detalles->subject) ?>					
					
				@endif				
				<?php $from = utf8_decode(imap_utf8($detalles->from)) ?>			

				<td>{!! $detalles->msgno !!}</td>
				<td>{!! $from 	 !!}</td>
				<td>{!! $subject !!}</td>
				<td>{!! $detalles->size.' bytes'!!}</td>
				<td>{!! $detalles->date!!}</td>
				@if($detalles->seen == "0")
					<td><b>Sin leer</b></td>
				@else
					<td>Leido</td>
				@endif
				<td>{!! $detalles->msgno !!}</td>

			</tr>

		@endforeach
	</table>
		{{-- Se cierra la conexion--}}	
		<?php imap_close($inbox); ?>
</div> {{-- End container --}}
@endsection