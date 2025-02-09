@use(App\Managers\ProjectManager)

@php
    /** @var ProjectManager $project */
@endphp

<x-page titre="Modifier projet">
    <div class="d-flex justify-content-center">
        <h1>Projet : {{ $project->details->pro_name }}</h1>
    </div>

    <form action="{{ route('project.update', $project->details->pro_id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <!-- Projet -->
        <fieldset class="my-2">
            <legend>Projet</legend>
            <div class="row">
                <!-- Name -->
                <div class="col-md-8 col-sm-6">
                    <label for="name" class="col-form-label">Nom</label>
                    <input name="name" class="form-control" type="text"
                           value="{{ $project->details->pro_name }}"
                           maxlength="50" required>
                </div>
                <div class="col-md-4 col-sm-6">
                    <label for="year" class="col-form-label">Année</label>
                    <input name="year" class="form-control" type="number"
                           value="{{ $project->details->pro_year }}"
                           min="2000" max="2100" required>
                </div>
            </div>
            <!-- Summary -->
            <div>
                <label for="summary" class="col-form-label">Présentation</label>
                <textarea name="summary" class="form-control" maxlength="200" required
                >{{ $project->details->pro_summary }}</textarea>
            </div>
        </fieldset>

        <!-- Links -->
        <fieldset class="my-2">
            <legend>Liens</legend>
            <div id="links" class="row">
                @foreach($project->links as $i => $link)
                    <div class="col-md-6">
                        <div class="border rounded m-2 p-2">
                            <div class="d-flex justify-content-center">
                                <span class="h4">{{ $link->lin_label }}</span>
                            </div>
                            <!-- id -->
                            <input name="links[{{ $i }}][id]" type="text"
                                   value="{{ $link->lin_id }}" hidden required>
                            <!-- label -->
                            <div class="my-2">
                                <label for="links[{{ $i }}][label]"
                                       class="col-form-label">Nom</label>
                                <input name="links[{{ $i }}][label]" class="form-control"
                                       type="text"
                                       value="{{ $link->lin_label }}"
                                       maxlength="100" required>
                            </div>
                            <!-- href -->
                            <div class="my-2">
                                <label for="links[{{ $i }}][href]"
                                       class="col-form-label">Destination</label>
                                <input name="links[{{ $i }}][href]" class="form-control" type="text"
                                       value="{{ $link->lin_href }}"
                                       maxlength="100" required>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6 m-2">
                    <button type="button" class="btn btn-secondary">Ajouter un lien</button>
                </div>
            </div>
        </fieldset>

        <!-- Tools -->
        <fieldset class="my-2">
            <legend>Outils</legend>
            <div id="tools" class="row">
                @foreach($project->tools as $i => $tool)
                    <div class="col-md-6">
                        <div class="my-2 row">
                            <div class="col-9">
                                <label for="tools[{{ $i }}][label]" hidden></label>
                                <input name="tools[{{ $i }}][label]" class="form-control"
                                       type="text"
                                       value="{{ $tool->too_label }}"
                                       maxlength="50" required>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary">Ajouter un outils</button>
                </div>
            </div>
        </fieldset>

        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-secondary">Retour</button>
            <button type="reset" class="btn btn-primary">Valeurs par défaut</button>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
    </form>
</x-page>
