@use(Carbon\Carbon)

<x-page :titre="'Projet : ' . $project->pro_name">
    <i>Année : {{ $project->pro_year }}</i>

    <h1>{{ $project->pro_name }}</h1>
    <p>{{ $project->pro_summary }}</p>

    @if($project->links->isNotEmpty())
        <h2>Liens vers le projet</h2>
        <ul>
            @foreach($project->links as $link)
                <li>
                    <a target="_blank"
                       href="{{ $link->lin_href }}">{{ $link->lin_label }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    @if ($project->pro_nbPicture > 0)
        <h2>Aperçu</h2>
        <div class="row g-2 justify-content-around">
            @for($i = 1 ; $i <= $project->pro_nbPicture ; $i++)
                <div class="row col-4">
                    <img class="p-3 col-12"
                         src="{{ asset('images/projets/'
                            . $project->pro_id . '/img' . $i .'.png') }}"
                         alt="image {{ $i }}">
                </div>
            @endfor
        </div>
    @endif

    <!-- TODO : authaurization -->
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary"
           href="{{ route("project.edit", ["id" => $project->pro_id]) }}">
            Modifier
        </a>
    </div>
</x-page>
