@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
<h1>Administración de usuarios</h1>
<p>Busca cuentas y administra sus roles de acceso.</p>

<form method="GET" action="{{ route('admin.users.index') }}" class="search-form">
    <input name="q" value="{{ $q }}" placeholder="Buscar por nombre o correo">
    <select name="role">
        <option value="">Todos los roles</option>
        @foreach (['admin', 'instructor', 'aprendiz'] as $itemRole)
            <option value="{{ $itemRole }}" @selected($role === $itemRole)>{{ ucfirst($itemRole) }}</option>
        @endforeach
    </select>
    <button type="submit">Buscar</button>
    @if ($q !== '' || $role !== '')
        <a href="{{ route('admin.users.index') }}">Limpiar filtros</a>
    @endif
</form>

<div class="toolbar">
    <span>{{ $users->total() }} usuario(s)</span>
    <a class="button" href="{{ route('admin.users.create') }}">Crear usuario</a>
</div>

@if ($users->isNotEmpty())
<table>
    <thead><tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Acciones</th></tr></thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td class="actions">
                <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                @if (auth()->id() !== $user->id)
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('¿Eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                @else
                    <span>Tu cuenta</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pagination">{{ $users->links() }}</div>
@else
    <p>No se encontraron usuarios con esos filtros.</p>
@endif
@endsection
