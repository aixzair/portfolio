/**
 * Cette classe permet de créer la carte d'un projet HTML à partir d'une balise div contenant
 * les bonnes infos
 * @author Alexandre Lerosier
 */
export class Projet {
    // Classe -------------------------------------------------------

    /**
     * Fabrique toute les cartes des projets à partir des classes contenant "js-projet"
     * @returns {void}
     */
    static fabriquerTout() {
        const PROJETS_HTML = document.getElementById("projets");
        const projets = document.getElementsByClassName("js-projet");

        for (const i = 0; projets.length > 0;) {
            const projetHTML = (new Projet(
                projets[i].dataset.href,
                projets[i].dataset.recto,
                projets[i].dataset.verso
            )).fabriquer();

            PROJETS_HTML.removeChild(projets[i]);
            PROJETS_HTML.appendChild(projetHTML);
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
     * Créé le code HTML de la carte
     * @returns {HTML} la carte du projet créé
     */
    fabriquer() {
        const projet = document.createElement("div");
        const lien = document.createElement("a");
        const carte = document.createElement("div");
        const recto = this.#creerFaceHTML(this.#recto);
        const verso = this.#creerFaceHTML(this.#verso);

        recto.classList.add("carte-recto");
        carte.appendChild(recto);

        verso.classList.add("carte-verso");
        carte.appendChild(verso);

        carte.classList.add("carte");
        lien.appendChild(carte);

        lien.href = this.#href;
        projet.appendChild(lien);

        projet.classList.add("projet");

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
<div class="projet">
    <a href="./projets/pomodoro.html">
        <div class="carte">
            <div class="carte-recto">
                <h2>Pomodoro</h2>
            </div>
            <div class="carte-verso">
                <h2>Un outil pour gérer votre temps de travail et de repos</h2>
            </div>
        </div>
    </a>
</div>
*/
