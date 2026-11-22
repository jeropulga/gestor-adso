<nav class="flex flex-wrap items-center gap-4 border-b pb-4 mb-6">
    @auth
        <a href="{{ route('aprendices.index') }}">Aprendices</a>
        <span>Hola, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
        <a href="{{ route('profile.edit') }}">Perfil</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Salir</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    @endguest
</nav>
