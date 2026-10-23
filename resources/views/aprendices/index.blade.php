<h1>Aprendices</h1>

@if (session('ok'))
    <p>{{ session('ok') }}</p>
@endif

<a href="{{ route('aprendices.create') }}">Crear aprendiz</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($aprendices as $aprendiz)
            <tr>
                <td>{{ $aprendiz->id }}</td>
                <td>{{ $aprendiz->nombre }}</td>
                <td>{{ $aprendiz->documento }}</td>
                <td>{{ $aprendiz->correo }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay aprendices registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $aprendices->links() }}