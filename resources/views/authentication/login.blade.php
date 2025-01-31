<x-page titre="Connexion">
    <h1>Connexion</h1>

    <x-form route="loginPost">
        <x-input nom="email" text="Adresse mail" type="email" required/>
        <x-input nom="password" text="Mot de passe" type="password" required/>
        <button type="submit" class="btn btn-primary my-2">Connexion</button>
    </x-form>
</x-page>
