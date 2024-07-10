import HtmlBuilder from "./HtmlBuilder.js";

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
            }
        });

        if (!input) {
            console.error(`dform-suppr | data-form-suppr (${name}) introuvable.`);
            return;
        }
        input.value = '0';
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
            }
        });
        if (!input) {
            console.error(`dform-suppr | data-form-suppr (${name}) introuvable.`);
            return;
        }
        input.disabled = false;
        input.value = '1';
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
        element.querySelectorAll('input, select, textarea').forEach(input => {
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

        const groupeNom = HtmlBuilder.creerInputGroup(
            'text', `points[${index}][nom]`, 'Nom'
        );
        groupeNom.classList.add('my-2');

        const groupeDescription = HtmlBuilder.creerInputGroup(
            'textarea', `points[${index}][description]`, 'Description'
        );
        groupeDescription.classList.add('my-2');

        const bouton = DFormBuilder.#creerBouton();
        DFormBuilder.#setBouton(bouton, 'annulerAjout');

        point.appendChild(p);
        point.appendChild(groupeNom);
        point.appendChild(groupeDescription);
        point.appendChild(bouton);

        racine.appendChild(point);
    }

    /**
     * Ajoute un input pour ajouter un lien
     * @param racine {HTMLElement} endroit où ajouter l'input
     */
    static #projetLien(racine) {
        const index = racine.children.length + 1;

        const lien = document.createElement('div');
        const p = document.createElement('p');
        p.textContent = 'Lien ' + index;

        const groupeNom = HtmlBuilder.creerInputGroup(
            'text', `liens[${index}][nom]`, 'Nom'
        );
        groupeNom.classList.add('my-2');

        const groupeDestination = HtmlBuilder.creerInputGroup(
            'text', `liens[${index}][destination]`, 'Lien'
        );
        groupeDestination.classList.add('my-2');

        const bouton = DFormBuilder.#creerBouton();
        DFormBuilder.#setBouton(bouton, 'annulerAjout');

        lien.appendChild(p);
        lien.appendChild(groupeNom);
        lien.appendChild(groupeDestination);
        lien.appendChild(bouton);

        racine.appendChild(lien);
    }
}
