<header>
    <nav class="navbar navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand header-font text-black" href="{{ route('home') }}">Alexandre
                Lerosier</a>
            <button class="navbar-toggler text-black" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navBar" aria-controls="navBar" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-black"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBar">
                <div class="navbar-nav">
                    <a class="nav-link text-black hover-underline"
                       href="{{ route('home') }}">Profil</a>
                    <a class="nav-link text-black hover-underline"
                       href="{{ route('projet.index') }}">Projets</a>
                    <a class="nav-link text-black hover-underline"
                       href="{{ route('profile.contacts') }}">Contact</a>
                    <a class="nav-link text-black  hover-underline"
                       href="{{ asset('docs/cv.pdf') }}"
                       target="_blank">CV (2024)</a>
                </div>
            </div>
        </div>
    </nav>
</header>
