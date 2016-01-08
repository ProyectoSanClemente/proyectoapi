<table class="table">
    <thead>
            <th>Titulo</th>
			<th>Contenido</th>
			<th>Imagen</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($notices as $notice)
        <tr>
            <td>{!! $notice->titulo !!}</td>
			<td>{!! $notice->contenido !!}</td>
			<td>{!! $notice->imagen !!}</td>
            <td>
                <a href="{!! route('noticias.edit', [$notice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('noticias.delete', [$notice->id]) !!}" onclick="return confirm('Are you sure wants to delete this Notice?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
