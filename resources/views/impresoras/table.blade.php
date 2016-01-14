<table class="table">
    <thead>
    <th>Id Usuario</th>
			<th>Modelo Impresora</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($impresoras as $impresora)
        <tr>
            <td>{!! $impresora->id_usuario !!}</td>
			<td>{!! $impresora->modelo_impresora !!}</td>
            <td>
                <a href="{!! route('impresoras.edit', [$impresora->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('impresoras.delete', [$impresora->id]) !!}" onclick="return confirm('Are you sure wants to delete this Impresora?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
