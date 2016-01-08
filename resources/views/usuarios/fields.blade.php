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

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
{{-- 
<!-- Password Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div> --}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario de usuario</div>
                

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        
                    	<!-- Rut Field -->
                    	<div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
	                        <div class="form-group">                            
	                            {!! Form::label('rut', 'Rut:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
		                        {!! Form::text('rut', null, ['class' => 'form-control']) !!}
	                            
		                        @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif	                            
	                            </div>
	                        </div>
	                    </div>

                        <!-- Nombre Field -->
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('nombre', 'Nombre:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>



                        <!-- Apellido Field -->
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('apellido', 'Apellido:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>

                        <!-- Email Field -->
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('email', 'Email:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('email', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>	                    
       
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                 {{ Form::text('password') }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
