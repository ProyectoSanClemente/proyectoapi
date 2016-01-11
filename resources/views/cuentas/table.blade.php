<table class="table">
    <thead>
    <th>Usuario Id</th>
			<th>Zimbra Id</th>
			<th>Zimbra Pass</th>
			<th>Nube Id</th>
			<th>Nube Pass</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr>
            <td>{!! $cuenta->usuario_id !!}</td>
			<td>{!! $cuenta->zimbra_id !!}</td>
			<td>{!! $cuenta->zimbra_pass !!}</td>
			<td>{!! $cuenta->nube_id !!}</td>
			<td>{!! $cuenta->nube_pass !!}</td>
            <td>
                <a href="{!! route('cuentas.edit', [$cuenta->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('cuentas.delete', [$cuenta->id]) !!}" onclick="return confirm('Are you sure wants to delete this Cuenta?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
