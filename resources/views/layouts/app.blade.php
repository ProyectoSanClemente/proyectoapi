<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intranet</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/navbar-fixed-top.css')}}
    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default  navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Inicio
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                 <ul class="nav navbar-nav">
                    <li> {{ HTML::link('usuarios', 'Directorio Empleados')}}</li>
                </ul>

                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('usuarios', 'Eventos')}}</li>
                </ul>
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('usuarios', 'Tareas')}}</li>
                </ul>
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('noticias', 'Noticias')}}</li>
                </ul>
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('usuarios', 'Contenido')}}</li><li> {{ HTML::link('usuarios', 'Flujo de Trabajo')}}</li>
                </ul>
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('emails/index', 'Correo')}}</li>
                </ul>
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('usuarios', 'Administrador')}}</li> 
                </ul>                
                <ul class="nav navbar-nav">
                    <li> {{ HTML::link('sistemas', 'Sistemas')}}</li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{HTML::image(Auth::user()->imagen,null,array('class'=>'img-circle special-img','width'=>'25px'))}}

                                {{ Auth::user()->nombre.' '.Auth::user()->apellido }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                
                                <li><a href="{{ URL::to('usuarios/' .Auth::id().'/edit') }}"><i class="fa fa-btn fa-edit"></i>Editar</a></li>

                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                            </ul>


                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')


    <!-- JavaScripts -->

    {{ HTML::script('js/jquery.min.js')}}
    {{ HTML::script('js/bootstrap.min.js')}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
