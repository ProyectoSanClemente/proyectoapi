<!-- Id Usuario Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
	{!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Impresora Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('modelo_impresora', 'Modelo Impresora:') !!}
	{!! Form::text('modelo_impresora', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
