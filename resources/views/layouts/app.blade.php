<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestor ADSO')</title>
    <style>
        body {
            max-width: 980px;
            margin: 24px auto;
            padding: 0 16px;
            font-family: system-ui, sans-serif;
        }

        nav a {
            margin-right: 12px;
        }

        .flash {
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 8px;
            background: #e6ffed;
        }

        .errors {
            margin-bottom: 16px;
            padding: 12px 16px;
            border: 1px solid #b42318;
            border-radius: 8px;
            color: #7a271a;
            background: #fef3f2;
        }

        label {
            display: inline-block;
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('aprendices.index') }}">Aprendices</a>
    </nav>

    @if (session('ok'))
        <div class="flash" role="status">{{ session('ok') }}</div>
    @endif

    @yield('content')
</body>
</html>
