<table class="table">
    <thead>
    <th>Rut</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->rut !!}</td>
			<td>{!! $usuario->nombre !!}</td>
			<td>{!! $usuario->apellido !!}</td>
			<td>{!! $usuario->email !!}</td>
            <td>
                <a href="{!! route('usuarios.edit', [$usuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuarios.delete', [$usuario->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
