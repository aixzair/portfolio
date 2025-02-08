<x-page titre="Projets">
    <div class="row g-3 mt-2">
        @foreach($projects as $project)
            <a class="col-md-4 text-decoration-none"
               href="{{ route("project.show", ["id" => $project->pro_id]) }}">
                <div class="card">
                    @if($project->pro_picture)
                        <img src="{{ asset("images/projets/$project->pro_id/carte.png") }}"
                             class="card-img-top"
                             alt="{{ $project->pro_name }}">
                    @else
                        <!-- TODO -->
                    @endif
                    <div class="card-body">
                        <p class="card-text text-center">{{ $project->pro_name }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-page>
