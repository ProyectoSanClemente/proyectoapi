
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('usuario_id', 'Usuario Id:') !!}
	{!! Form::text('usuario_id',$id_usuario,['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('zimbra_id', 'Zimbra Id:') !!}
	{!! Form::text('zimbra_id', null, ['class' => 'form-control']) !!}
</div>
<!-- Zimbra Pass Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('zimbra_pass', 'Zimbra Pass:') !!}
	{!! Form::password('zimbra_pass', ['class' => 'form-control']) !!}
</div>

<!-- Nube Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nube_id', 'Nube Id:') !!}
	{!! Form::text('nube_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nube Pass Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nube_pass', 'Nube Pass:') !!}
	{!! Form::password('nube_pass', ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
