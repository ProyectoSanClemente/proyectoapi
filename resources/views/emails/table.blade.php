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
			@if($mail->seen == "0")
				<tr style='font-weight:bold'>
			@else
				<tr>
			@endif
				<td>{!! $mail->msgno !!}</td>
				<td>{!! $mail->from 	 !!}</td>
				<td>{!! $mail->subject !!}</td>
				<td>{!! $mail->size.' bytes'!!}</td>
				<td>{!! $mail->date!!}</td>
				@if($mail->seen == "0")
					<td>Sin leer</td>
				@else
					<td>Leido</td>
				@endif
				<td><a href="{!! route('emails.show', [$mail->uid]) !!}"><i class="glyphicon glyphicon-envelope"></i></a></td>
			</tr>
		@endforeach
	</table>