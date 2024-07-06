<x-page titre="modifier projet">
    <x-form route="projet.update" :id="$projet->details->pro_id">
        <fieldset>
            <legend>Projet</legend>
            <div class="input-group my-2">
                <label class="input-group-text" for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       value="{{ old('titre', $projet->details->pro_titre) }}" required>
            </div>
            <div class="input-group my-2">
                <label class="input-group-text" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date"
                       value="{{ old('date', $projet->details->pro_date_debut) }}"
                       required>
            </div>
            <div class="input-group my-2">
                <label class="input-group-text" for="presentation">Présentation</label>
                <textarea class="form-control" id="presentation" name="presentation" required
                >{{ old('presentation', $projet->details->pro_presentation) }}</textarea>
            </div>
            <div></div>
        </fieldset>
        <fieldset>
            <legend>Liens</legend>
            <div id="liens">
                <!-- TODO -->
            </div>
            <button type="button" class="btn btn-secondary dform" data-dform="liens"
                    data-dform-type="projetLien">
                Ajouter
            </button>
        </fieldset>
        <fieldset>
            <legend>Points travaillés</legend>
            <div id="listePoints">
                <!-- TODO -->
                @foreach(old('definitions', $projet->points ?? []) as $index => $point)
                    <div>
                        <div>Point {{ $index + 1 }}</div>
                        <div class="input-group my-2">
                            <label class="input-group-text"
                                   for="points[{{ $index }}][nom]">Nom</label>
                            <input class="form-control" name="points[{{ $index }}][nom]" type="text"
                                   value="{{ old("points[$index][nom]", $point->poi_nom) }}">
                            <input type="hidden" name="points[{{ $index }}][data_id]"
                                   value="{{ $point->poi_id }}">
                        </div>
                        <div class="input-group my-2">
                            <label class="input-group-text"
                                   for="points[{{ $index }}][description]">Description</label>
                            <textarea class="form-control"
                                      name="points[{{ $index }}][description]"
                            >{{ old("points[$index][description]", $point->poi_definition) }}</textarea>
                        </div>
                        <input type="hidden" name="points[{{ $index }}][suppr]"
                               value="false">
                        <button type="button" class="btn btn-danger btn-sm mb-2 dform-suppr"
                                data-dform-suppr="points[{{ $index }}][suppr]">
                            Supprimer
                        </button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-secondary dform" data-dform="listePoints"
                    data-dform-type="pointTravaille">
                Ajouter
            </button>
        </fieldset>
        <fieldset>
            <legend>Aperçus</legend>
        </fieldset>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </x-form>
</x-page>
