@use(App\Managers\ProjectManager)

@php
    /** @var ProjectManager $project */
@endphp

<x-page titre="Modifier projet">
    <form method="POST">
        @csrf
        @method('PUT')

        <!-- Projet -->
        <fieldset>
            <legend>Projet</legend>
            <!-- Name -->
            <div>
                <label class="col-form-label">Nome</label>
                <input class="form-control" type="text" value="{{ $project->details->pro_name }}"
                       required>
            </div>
            <!-- Year -->
            <div>
                <label class="col-form-label">Date</label>
                <input class="form-control" type="date" value="{{ $project->details->pro_year }}"
                       required>
            </div>
            <!-- Summary -->
            <div>
                <label class="col-form-label">Présentation</label>
                <input class="form-control" type="text" value="{{ $project->details->pro_summary }}"
                       required>
            </div>
        </fieldset>

        <!-- Links -->
        <fieldset>
            <legend>Liens</legend>
            <div>
                @foreach($project->links as $i => $link)
                    <div>
                        <span>Lien {{ $i + 1 }}</span>
                        <!-- label -->
                        <div>
                            <label class="col-form-label">Nom</label>
                            <input class="form-control" type="text" value="{{ $link->lin_label }}"
                                   required>
                        </div>
                        <!-- href -->
                        <div>
                            <label class="col-form-label">Destination</label>
                            <input class="form-control" type="text" value="{{ $link->lin_href }}"
                                   required>
                        </div>
                    </div>
                @endforeach
                <button type="button" class="btn btn-primary">Ajouter un lien</button>
            </div>
        </fieldset>

        <!-- Tools -->
        <fieldset>
            <legend>Outils</legend>
            <div>
                @foreach($project->tools as $i => $tool)
                    <div>
                        <div>Outils {{ $i + 1 }}</div>
                        <!-- Label -->
                        <div>
                            <label class="col-form-label">Description</label>
                            <input class="form-control" type="text" value="{{ $tool->too_label }}"
                                   required>
                        </div>
                    </div>
                @endforeach
                <button type="button" class="btn btn-primary">Ajouter un outils</button>
            </div>
        </fieldset>

        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Retour</button>
            <button type="reset" class="btn btn-secondary">Valeurs par défaut</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</x-page>
