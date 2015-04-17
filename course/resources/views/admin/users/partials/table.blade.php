<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user->id) }}">Editar</a>
            <a href="">Eliminar</a>
        </td>
    </tr>
    @endforeach
</table>