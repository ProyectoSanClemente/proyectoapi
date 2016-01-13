@extends('layouts.app')

@section('content')
<div class="container">

	@include('flash::message')

	<div class="row">
	<h1 class="pull-left">Correos No vistos</h1>
	</div>

	@include('emails.table')
	
</div> {{-- End container --}}
@endsection