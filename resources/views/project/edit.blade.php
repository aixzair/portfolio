@use(App\Managers\ProjetComplet)

@php
    /** @var ProjetComplet $projet */
    $oldImageCarte = old('imageCarte', $projet->details->pro_image ? '1' : '0');
@endphp

<x-page titre="modifier projet">
    <x-form route="project.update" :id="$projet->details->pro_id" methode="PUT">
        <!-- Projet -->
        <fieldset>
            <legend>Projet</legend>
            <!-- Nom -->
            <div class="input-group my-2">
                <label class="input-group-text" for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom"
                       value="{{ old('nom', $projet->details->pro_nom) }}" required>
            </div>
            <!-- Date -->
            <div class="input-group my-2">
                <label class="input-group-text" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date"
                       value="{{ old('date', $projet->details->pro_date) }}"
                       required>
            </div>
            <!-- Présentation -->
            <div class="input-group my-2">
                <label class="input-group-text" for="presentation">Présentation</label>
                <textarea class="form-control" id="presentation" name="presentation" required
                >{{ old('presentation', $projet->details->pro_presentation) }}</textarea>
            </div>
            <!-- Image carte -->
            <div class="input-group">
                <div class="input-group-text">Carte image</div>
                <div class="form-control">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="imageCarte"
                               id="imgCarteOui" value="1"
                                {{ $oldImageCarte == '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="imgCarteOui">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="imageCarte"
                               id="imgCarteNon" value="0"
                                {{ $oldImageCarte != '1' ? 'checked' : ''}}>
                        <label class="form-check-label" for="imgCarteNon">Non</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <!-- Liens -->
        <fieldset>
            <legend>Liens</legend>
            <div id="listeLiens">
                @foreach($projet->liens as $i => $lien)
                    <div>
                        <div>Lien {{ $i + 1 }}</div>
                        <!-- Nom -->
                        <div class="input-group my-2">
                            <label class="input-group-text" for="liens[{{ $i }}][nom]">Nom</label>
                            <input class="form-control" type="text" name="liens[{{ $i }}][nom]"
                                   value="{{ $lien->lien_nom }}" required>
                        </div>
                        <!-- Destination -->
                        <div class="input-group my-2">
                            <label class="input-group-text"
                                   for="liens[{{ $i }}][destination]">Lien</label>
                            <input class="form-control" type="text"
                                   name="liens[{{ $i }}][destination]"
                                   value="{{ $lien->lien_destination }}" required>
                        </div>
                        <!-- Suppression -->
                        <input type="hidden" name="liens[{{ $i }}][suppression]"
                               value="0">
                        <!-- Id -->
                        <input type="hidden" name="liens[{{ $i }}][id]"
                               value="{{ $lien->lien_id }}">
                        <!-- Bouton suppression -->
                        <button type="button" class="btn btn-danger btn-sm mb-2 dform-suppr"
                                data-dform-suppr="liens[{{ $i }}][suppression]">
                            Supprimer
                        </button>
                    </div>
                @endforeach
                <!-- TODO old -->
            </div>
            <button type="button" class="btn btn-secondary dform" data-dform="listeLiens"
                    data-dform-type="projetLien">
                Ajouter
            </button>
        </fieldset>
        <!-- Points travaillés -->
        <fieldset>
            <legend>Points travaillés</legend>
            <div id="listePoints">
                <!-- TODO -->
                @foreach($projet->points as $i => $point)
                    <div>
                        <div>Point {{ $i + 1 }}</div>
                        <!-- Point nom -->
                        <div class="input-group my-2">
                            <label class="input-group-text"
                                   for="points[{{ $i }}][nom]">Nom</label>
                            <input class="form-control" name="points[{{ $i }}][nom]" type="text"
                                   value="{{ old("points[$i][nom]", $point->poi_nom) }}">
                        </div>
                        <!-- Point description -->
                        <div class="input-group my-2">
                            <label class="input-group-text"
                                   for="points[{{ $i }}][description]">Description</label>
                            <textarea class="form-control"
                                      name="points[{{ $i }}][description]"
                            >{{ old("points[$i][description]", $point->poi_definition) }}</textarea>
                        </div>
                        <!-- Point suppression -->
                        <input type="hidden" name="points[{{ $i }}][suppression]" value="0">
                        <!-- Point id -->
                        <input type="hidden" name="points[{{ $i }}][id]"
                               value="{{ $point->poi_id }}">
                        <!-- Point suppression -->
                        <button type="button" class="btn btn-danger btn-sm mb-2 dform-suppr"
                                data-dform-suppr="points[{{ $i }}][suppression]">
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
