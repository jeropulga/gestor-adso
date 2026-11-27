@extends('layouts.app')
@section('title', 'Crear usuario')
@section('content')
<h1>Crear usuario</h1>
<p>Si dejas la contraseña vacía, se generará una clave temporal.</p>
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="field"><label for="name">Nombre</label><input id="name" name="name" value="{{ old('name') }}" maxlength="120" required>@error('name')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="email">Correo</label><input id="email" type="email" name="email" value="{{ old('email') }}" maxlength="150" required>@error('email')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="role">Rol</label><select id="role" name="role" required>@foreach ($roles as $itemRole)<option value="{{ $itemRole }}" @selected(old('role', 'aprendiz') === $itemRole)>{{ ucfirst($itemRole) }}</option>@endforeach</select>@error('role')<div class="danger">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="password">Contraseña (opcional, mínimo 8 caracteres)</label><input id="password" type="password" name="password" autocomplete="new-password">@error('password')<div class="danger">{{ $message }}</div>@enderror</div>
    <button type="submit">Crear usuario</button>
    <a class="button" href="{{ route('admin.users.index') }}">Cancelar</a>
</form>
@endsection
