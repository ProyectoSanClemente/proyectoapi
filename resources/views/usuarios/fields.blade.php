<!-- Rut Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rut', 'Rut:') !!}
	{!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido', 'Apellido:') !!}
	{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('correo', 'Correo:') !!}
	{!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
