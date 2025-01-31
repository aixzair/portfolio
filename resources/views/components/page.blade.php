<!DOCTYPE html>
<html class="h-100"
      data-bs-theme="light"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <title>{{ $titre }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="module" src="{{ asset('js/app.js') }}"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('extensions/bootstrap/bootstrap.css') }}">
    <script src="{{ asset('extensions/bootstrap/bootstrap.bundle.js') }}"></script>
</head>
<body class="d-flex flex-column h-100">
<x-header/>

<main role="main" class="container">
    @if (session('success'))
        <div class="alert alert-success my-2">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger my-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ $slot }}
</main>

<x-footer/>
</body>
</html>
