@use("Carbon\Carbon")

<x-page titre="projet">
    <i>Année : {{ Carbon::parse($projet->details->pro_date_debut)->format("Y") }}
        ({{ $projet->details->pro_date_fin }})</i>

    <h1>{{ $projet->details->pro_titre }}</h1>
    <p>{{ $projet->details->pro_presentation }}</p>

    @if($projet->liens->isNotEmpty())
        <h2>Liens vers le projet</h2>
        <ul>
            @for($projet->liens as $lien)
                <li>
                    <a href="{{ $lien-> }}"></a>
                </li>
            @endfor
        </ul>
    @endif

    @if ($projet->points->isNotEmpty())
        <h2 class="contenu-titre">Points travaillés</h2>
        <ul>
            @foreach($projet->points as $point)
                <li>
                    <strong>{{ $point->poi_nom }} :</strong> {{ $point->poi_definition }}
                </li>
            @endforeach
        </ul>
    @endif

    <h2>Aperçu</h2>

    <div class="d-flex justify-content-center">
        <a class="btn btn-primary"
           href="{{ route("projet.edit", ["id" => $projet->details->pro_id]) }}">
            Modifier
        </a>
    </div>
</x-page>
