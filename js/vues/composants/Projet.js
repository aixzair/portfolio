/**
 * Fabrique des cartes cliquable représentant des projets
 * @author Alexandre Lerosier
 */
export class Projet {
    // Classe -------------------------------------------------------

    /**
     * Fabrique toute les cartes des projets à partir des classes contenant "js-projet"
     * @returns {void}
     */
    static fabriquerTout() {
        const CARTES = document.getElementsByClassName("cartes");

        for (let cartes of CARTES) {
            const projets = cartes.querySelectorAll(".js-projet");

            projets.forEach(projet => {
                const carte = (new Projet(
                    projet.dataset.href,
                    projet.dataset.recto,
                    projet.dataset.verso
                )).fabriquer();

                cartes.removeChild(projet);
                cartes.appendChild(carte);
            });
        }
    }

    // Instance -----------------------------------------------------

    #href;
    #recto;
    #verso;

    /**
     * Construit la carte d'un projet
     * @param {String} href lien du vers la pages du projets
     * @param {String} recto texte affiché au verso de la page
     * @param {String} verso texte affiché au recto de la page
     */
    constructor(href, recto, verso) {
        this.#href = href;
        this.#recto = recto;
        this.#verso = verso;
    }

    /**
     * Créé une carte représentant un projet
     * @returns {HTML} la carte du projet créé
     */
    fabriquer() {
        const projet = document.createElement("a");
        const carte = document.createElement("div");
        const recto = this.#creerFaceHTML(this.#recto);
        const verso = this.#creerFaceHTML(this.#verso);

        recto.classList.add("carte-recto");
        carte.appendChild(recto);

        verso.classList.add("carte-verso");
        carte.appendChild(verso);

        carte.classList.add("carte-interieur");
        projet.appendChild(carte);

        projet.classList.add("carte-exterieur");
        projet.href = this.#href;
        projet.classList.add("color-inherit");

        return projet;
    }

    /**
     * Créer la face d'une carte
     * @param {String} texte texte afficher sur la face
     * @returns {HTML} face de la carte
     */
    #creerFaceHTML(texte) {
        const face = document.createElement("div");
        const contenu = document.createElement("h2");

        contenu.textContent = texte;
        face.appendChild(contenu);

        return face;
    }
}

/* Exemple -----------------------------------
// Avant :
<div
    class="js-projet"
    data-href="./projets/pomodoro.html"
    data-recto="Pomodoro"
    data-verso="Un outil pour gérer votre temps de travail et de repos"
>
</div>

// Après :
<a href="./projets/pomodoro.html" class="projet color-inherit">
    <div class="carte">
        <div class="carte-recto">
            <h2>Pomodoro</h2>
        </div>
        <div class="carte-verso">
            <h2>Un outil pour gérer votre temps de travail et de repos</h2>
        </div>
    </div>
</a>
*/
