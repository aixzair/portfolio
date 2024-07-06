export default class DFormBuilder {
    static #evtAnnuler = function (evt) {
        const bouton = evt.target;
        bouton.textContent = 'Supprimer';
        bouton.classList.remove('btn-success');
        bouton.classList.add('btn-danger');
        bouton.removeEventListener('click', DFormBuilder.#evtAnnuler);
        bouton.addEventListener('click', DFormBuilder.#evtSupprimer);

        const parent = bouton.parentElement;
        DFormBuilder.#activerInputs(parent, false);

        // Indique dans l'input caché que l'élément n'est pas supprimé.
        const name = bouton.dataset.dformSuppr;
        if (!name) {
            console.error('dform-suppr | data-form-suppr non présent.')
            return;
        }
        let input;
        parent.querySelectorAll('input').forEach(element => {
            if (element.name === name) {
                input = element;
                return;
            }
        });

        if (!input) {
            console.error(`dform-suppr | data-form-suppr (${name}) introuvable.`);
            return;
        }
        input.value = 'false';
    }

    static #evtSupprimer = function (evt) {
        const bouton = evt.target;
        bouton.textContent = 'Annuler suppression';
        bouton.classList.remove('btn-danger');
        bouton.classList.add('btn-success');
        bouton.removeEventListener('click', DFormBuilder.#evtSupprimer);
        bouton.addEventListener('click', DFormBuilder.#evtAnnuler);

        const parent = bouton.parentElement;
        DFormBuilder.#activerInputs(parent, true);

        // Indique dans l'input caché que l'élément est supprimé.
        const name = bouton.dataset.dformSuppr;
        if (!name) {
            console.error('dform-suppr | data-form-suppr non présent.')
            return;
        }
        let input;
        parent.querySelectorAll('input').forEach(element => {
            if (element.name === name) {
                input = element;
                return;
            }
        });
        if (!input) {
            console.error(`dform-suppr | data-form-suppr (${name}) introuvable.`);
            return;
        }
        input.disabled = false;
        input.value = 'true';
    }

    /**
     * Démare le formulaire dynamique
     */
    static start() {
        document.querySelectorAll('.dform-suppr').forEach(bouton => {
            bouton.addEventListener('click', DFormBuilder.#evtSupprimer);
        });

        document.querySelectorAll('.dform').forEach(bouton => {
            bouton.addEventListener('click', () => {
                const id = bouton.dataset.dform || "Sans id.";
                const racine = document.getElementById(id);
                if (!racine) {
                    console.error(`dform | Dataset "dform" (${id}) introuvable.`)
                    return;
                }

                const type = bouton.dataset.dformType;
                switch (type) {
                    case "pointTravaille":
                        DFormBuilder.#pointTravaille(racine);
                        break;
                    case "projetLien":
                        DFormBuilder.#projetLien(racine);
                        break;
                    default:
                        console.error(`dform | Dataset "deform-type (${type}) inconnu.`);
                        return;
                }
            });
        });
    }

    static #activerInputs(element, actif) {
        const inputs = element
            .querySelectorAll('input, select, textarea')
            .forEach(input => {
                if (input.type !== 'hidden') {
                    input.readOnly = actif;
                }
            });
    }

    static #creerBouton() {
        const bouton = document.createElement('button');
        bouton.setAttribute('type', 'button');
        bouton.classList.add('btn');
        bouton.classList.add('btn-sm');
        bouton.classList.add('my-2');

        return bouton;
    }

    /**
     * Règle le bouton
     * @param bouton {HTMLButtonElement} bouton à régler
     * @param action {string} type de bouton
     */
    static #setBouton(bouton, action) {
        bouton.classList.remove('btn-danger');
        bouton.classList.remove('btn-secondary');

        switch (action) {
            case 'annulerAjout':
                bouton.textContent = 'Annuler ajout'
                bouton.classList.add('btn-danger');
                bouton.addEventListener('click', () => {
                    bouton.parentElement.remove();
                });
                break;
            default:
                bouton.textContent = 'inconnu';
                return;
        }
    }

    /**
     * Ajoute un input pour ajouter un lien
     * @param racine {HTMLElement} endroit où ajouter l'input
     */
    static #pointTravaille(racine) {
        const index = racine.children.length + 1;

        const point = document.createElement('div');

        const p = document.createElement('p');
        p.textContent = 'Point ' + index;

        const groupes = [];
        for (let i = 0; i < 2; i++) {
            groupes[i] = document.createElement('div');
            groupes[i].classList.add('input-group');
            groupes[i].classList.add('my-2');
        }

        const termeLabel = document.createElement('label');
        termeLabel.textContent = 'Nom';
        termeLabel.classList.add('input-group-text');
        termeLabel.setAttribute('for', `points[${index}][nom]`);

        const termeInput = document.createElement('input');
        termeInput.classList.add('form-control');
        termeInput.setAttribute('type', 'text');
        termeInput.setAttribute('name', `points[${index}][nom]`);

        const descriptionLabel = document.createElement('label');
        descriptionLabel.textContent = 'Description';
        descriptionLabel.classList.add('input-group-text');
        descriptionLabel.setAttribute('for', `points[${index}][description]`);

        const descriptionInput = document.createElement('textarea');
        descriptionInput.classList.add('form-control');
        descriptionInput.setAttribute('name', `points[${index}][description]`);

        const bouton = DFormBuilder.#creerBouton();
        DFormBuilder.#setBouton(bouton, 'annulerAjout');

        groupes[0].appendChild(termeLabel);
        groupes[0].appendChild(termeInput);
        groupes[1].appendChild(descriptionLabel);
        groupes[1].appendChild(descriptionInput);

        point.appendChild(p);
        point.appendChild(groupes[0]);
        point.appendChild(groupes[1]);
        point.appendChild(bouton);

        racine.appendChild(point);
    }

    /**
     * Ajoute un input pour ajouter un lien
     * @param racine {HTMLElement} endroit où ajouter l'input
     */
    static #projetLien(racine) {
        const index = racine.children.length / 3 + 1;
        const p = document.createElement('p');
        p.textContent = 'Lien ' + index;

        const groupes = [];
        for (let i = 0; i < 2; i++) {
            groupes[i] = document.createElement('div');
            groupes[i].classList.add('input-group');
            groupes[i].classList.add('my-2');
        }

        const termeLabel = document.createElement('label');
        termeLabel.textContent = 'Nom';
        termeLabel.classList.add('input-group-text');
        termeLabel.setAttribute('for', 'definitions[]');

        const termeInput = document.createElement('input');
        termeInput.classList.add('form-control');
        termeInput.setAttribute('type', 'text');
        termeInput.setAttribute('name', 'definitions[]');

        const descriptionLabel = document.createElement('label');
        descriptionLabel.textContent = 'Lien';
        descriptionLabel.classList.add('input-group-text');
        descriptionLabel.setAttribute('for', 'definitions[]');

        const descriptionInput = document.createElement('input');
        descriptionInput.classList.add('form-control');
        descriptionInput.setAttribute('type', 'text');
        descriptionInput.setAttribute('name', 'definitions[]');

        groupes[0].appendChild(termeLabel);
        groupes[0].appendChild(termeInput);
        groupes[1].appendChild(descriptionLabel);
        groupes[1].appendChild(descriptionInput);

        racine.appendChild(p);
        racine.appendChild(groupes[0]);
        racine.appendChild(groupes[1]);
    }
}
