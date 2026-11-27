@extends('layouts.app')
@section('title', 'Editar usuario')
@section('content')
<h1>Editar usuario</h1>
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')
    <div class="field"><label for="name">Nombre</label><input id="name" name="name" value="{{ old('name', $user->name) }}" maxlength="120" required>@error('name')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="email">Correo</label><input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" maxlength="150" required>@error('email')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="role">Rol</label><select id="role" name="role" required>@foreach ($roles as $itemRole)<option value="{{ $itemRole }}" @selected(old('role', $user->role) === $itemRole)>{{ ucfirst($itemRole) }}</option>@endforeach</select>@error('role')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="password">Nueva contraseña (opcional)</label><input id="password" type="password" name="password" autocomplete="new-password">@error('password')<div class="danger">{{ $message }}</div>@enderror</div>
    <button type="submit">Guardar cambios</button>
    <a class="button" href="{{ route('admin.users.index') }}">Cancelar</a>
</form>
@endsection
