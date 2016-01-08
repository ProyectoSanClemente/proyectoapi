<!-- Titulo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('titulo', 'Titulo:') !!}
	{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenido Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('contenido', 'Contenido:') !!}
	{!! Form::text('contenido', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('imagen', 'Imagen:') !!}
	{!! Form::file('imagen', null,['class' => 'form-control','accept'=>"image/x-png, image/gif, image/jpeg"]) !!}

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
