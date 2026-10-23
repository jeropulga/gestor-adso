<h1>Crear aprendiz</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('aprendices.store') }}" method="POST">
    @csrf

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" value="{{ old('nombre') }}" required>

    <label for="documento">Documento</label>
    <input id="documento" name="documento" value="{{ old('documento') }}" required>

    <label for="correo">Correo</label>
    <input id="correo" name="correo" type="email" value="{{ old('correo') }}" required>

    <label for="ficha_id">Ficha (opcional)</label>
    <input id="ficha_id" name="ficha_id" type="number" value="{{ old('ficha_id') }}">

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('aprendices.index') }}">Volver</a>