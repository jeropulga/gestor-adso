<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Gestor ADSO'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { max-width: 1100px; margin: 24px auto; padding: 0 16px; font-family: system-ui, sans-serif; }
        .flash { background: #e6ffed; padding: 10px; border-radius: 8px; margin: 10px 0; }
        .danger { background: #ffecec; padding: 10px; border-radius: 8px; margin: 10px 0; }
        .field { margin: 14px 0; }
        .field label { display: block; font-weight: 600; margin-bottom: 4px; }
        .field input, .search-form input { border: 1px solid #9ca3af; border-radius: 4px; padding: 7px; }
        button, .button { display: inline-block; padding: 7px 12px; border: 1px solid #777; border-radius: 4px; cursor: pointer; }
        .toolbar, .search-form { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .toolbar { justify-content: space-between; margin: 16px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 14px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f3f4f6; }
        .actions form { display: inline; margin-left: 8px; }
        .pagination { margin-top: 18px; }
        .pagination svg { width: 18px; height: 18px; }
    </style>
</head>
<body class="font-sans antialiased">
    @include('layouts.navigation')

    @if (session('ok'))
        <div class="flash" role="status">{{ session('ok') }}</div>
    @endif

    @if (session('error'))
        <div class="danger" role="alert">{{ session('error') }}</div>
    @endif

    @isset($header)
        <header class="mb-4">{{ $header }}</header>
    @endisset

    <main>
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset
    </main>
</body>
</html>
