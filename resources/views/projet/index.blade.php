<x-page titre="projets">
    <div class="row g-3">
        @foreach($projets as $projet)
            <a class="col-md-4 link-underline link-underline-opacity-0"
               href="{{ route("projet.show", ["id" => $projet->pro_id]) }}">
                <div class="card">
                    @if($projet->pro_image)
                        <img src="{{ asset("images/projets/$projet->pro_id/carte.png") }}"
                             class="card-img-top"
                             alt="{{ $projet->pro_nom }}">
                    @else
                        <!-- TODO -->
                    @endif
                    <div class="card-body">
                        <p class="card-text text-center">{{ $projet->pro_nom }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-page>
