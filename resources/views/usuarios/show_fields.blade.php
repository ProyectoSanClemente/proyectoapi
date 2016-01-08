<!-- Rut Field -->
<div class="form-group">
    {!! Form::label('rut', 'Rut:') !!}
    <p>{!! $usuario->rut !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $usuario->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $usuario->apellido !!}</p>
</div>

<!-- email Field -->
<div class="form-group">
    {!! Form::label('email', 'email:') !!}
    <p>{!! $usuario->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $usuario->password !!}</p>
</div>

