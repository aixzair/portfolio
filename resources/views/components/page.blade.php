<!DOCTYPE html>
<html class="h-100"
      data-bs-theme="light"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $titre }}</title>

    <script type="module" src="{{ asset('js/app.js') }}"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('extensions/bootstrap/bootstrap.css') }}">
    <script src="{{ asset('extensions/bootstrap/bootstrap.bundle.js') }}"></script>
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand header-font" href="{{ route('home') }}">Alexandre Lerosier</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navBar" aria-controls="navBar" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBar">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page"
                       href="{{ route('home') }}">Profil</a>
                    <a class="nav-link" href="{{ route('projet.index') }}">Projets</a>
                    <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
                    <a class="nav-link" href="{{ asset('docs/cv.pdf') }}" target="_blank">CV</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main role="main" class="container">
    {{ $slot }}
</main>
<footer class="footer mt-auto py-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"/>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">Alexandre Lerosier</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter"/>
                    </svg>
                </a>
            </li>
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram"/>
                    </svg>
                </a>
            </li>
            <li class="ms-3"><a class="text-body-secondary" href="#">
                    <svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>
