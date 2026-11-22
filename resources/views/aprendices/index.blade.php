@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
    <h1 class="text-2xl font-bold">Listado de aprendices</h1>

    <div class="toolbar">
        @can('create', App\Models\Aprendiz::class)
            <a class="button" href="{{ route('aprendices.create') }}">+ Nuevo aprendiz</a>
        @endcan

        <form class="search-form" action="{{ route('aprendices.index') }}" method="GET">
            <input type="text" name="q" value="{{ $q }}" placeholder="Buscar por nombre o documento">
            <button type="submit">Buscar</button>
            @if ($q !== '')
                <a href="{{ route('aprendices.index') }}">Limpiar</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Documento</th><th>Correo</th><th>Ficha</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aprendices as $aprendiz)
                <tr>
                    <td>{{ $aprendiz->id }}</td>
                    <td>{{ $aprendiz->nombre }}</td>
                    <td>{{ $aprendiz->documento }}</td>
                    <td>{{ $aprendiz->correo }}</td>
                    <td>{{ $aprendiz->ficha_id ?? 'Sin ficha' }}</td>
                    <td class="actions">
                        @can('update', $aprendiz)
                            <a href="{{ route('aprendices.edit', $aprendiz) }}">Editar</a>
                        @endcan
                        @can('delete', $aprendiz)
                            <form action="{{ route('aprendices.destroy', $aprendiz) }}" method="POST" onsubmit="return confirm('¿Eliminar este aprendiz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700">Eliminar</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No hay aprendices registrados.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">{{ $aprendices->links() }}</div>
@endsection
