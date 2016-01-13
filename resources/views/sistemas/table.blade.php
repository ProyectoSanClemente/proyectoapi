<table class="table">
    <thead>
    <th>Nombre Sistema</th>
            <th>Imagen Sistema</th>
            <th>Redireccionar</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>

    @foreach($sistemas as $sistema)
        <tr>
            <td>{!! $sistema->nombre_sistema !!}</td>
            <td>{!! $sistema->imagen_sistema !!}</td>
            <td>{!! $sistema->redireccionar !!}</td>
            <td>
                <a href="{!! route('sistemas.edit', [$sistema->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('sistemas.delete', [$sistema->id]) !!}" onclick="return confirm('Are you sure wants to delete this Sistema?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                 <div align ="center" class="panel-heading">Sistemas</div>
                    @foreach($sistemas->chunk(4) as $variable)
                        <div class="panel-body">
                            @foreach($variable as $sistema)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" target="_blank" href="{!!$sistema->redireccionar!!}">
                                        <img class="img-responsive" src="{!!$sistema->imagen_sistema!!}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>