@use(Carbon\Carbon)

<x-page :titre="'Projet : ' . $projet->details->pro_nom">
    <i>Année : {{ Carbon::parse($projet->details->pro_date)->format("Y") }}</i>

    <h1>{{ $projet->details->pro_nom }}</h1>
    <p>{{ $projet->details->pro_presentation }}</p>

    @if($projet->liens->isNotEmpty())
        <h2>Liens vers le projet</h2>
        <ul>
            @foreach($projet->liens as $lien)
                <li>
                    <a target="_blank"
                       href="{{ $lien->lien_destination }}">{{ $lien->lien_nom }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    @if ($projet->points->isNotEmpty())
        <h2>Points travaillés</h2>
        <ul>
            @foreach($projet->points as $point)
                <li>
                    <strong>{{ $point->poi_nom }} :</strong> {{ $point->poi_definition }}
                </li>
            @endforeach
        </ul>
    @endif

    @if ($projet->details->pro_nbImage != 0)
        <h2>Aperçu</h2>
        <div class="row g-2 justify-content-around">
            @for($i = 1 ; $i <= $projet->details->pro_nbImage ; $i++)
                <div class="row col-4">
                    <img class="p-3 col-12"
                         src="{{ asset('images/projets/'
                            . $projet->details->pro_id . '/img' . $i .'.png') }}"
                         alt="image {{ $i }}">
                </div>
            @endfor
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <a class="btn btn-primary"
           href="{{ route("project.edit", ["id" => $projet->details->pro_id]) }}">
            Modifier
        </a>
    </div>
</x-page>
