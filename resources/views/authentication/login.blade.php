<x-page titre="Connexion">
    <h1>Connexion</h1>

    <form action="{{ route('loginPost') }}" method="POST">
        @csrf

        <x-input nom="email" text="Adresse mail" type="email" autofocus required/>
        <x-input nom="password" text="Mot de passe" type="password" required/>
        <button type="submit" class="btn btn-primary my-2">Connexion</button>
    </form>
</x-page>
