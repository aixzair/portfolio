import ACarte from "./ACarte.js";

/* Exemple de carte fabriqué :

<div class="carte-interieur">
    <div class="carte-exterieur">
        <div class="carte-face carte-face-recto">
            <span>contenu du recto</span>
        </div>
        <div class="carte-face carte-face-verso">
            <span>contenu du verso</span>
        </div>
    </div>
</div>

*/

/**
 * Fabrique une carte HTML basique
 * @author Alexandre Lerosier
 */
export default class Carte extends ACarte {
    #recto;
    #verso;

    /**
     * Constuit une carte js
     * @param {String} recto - contenu du recto de la carte
     * @param {String} verso - contenu du verso de la carte
     */
    constructor(recto, verso) {
        super();
        this.#recto = recto;
        this.#verso = verso;
    }

    /**
     * Renvoie le contenu du recto de la carte
     * @returns {String}
     */
    get recto() {
        return this.#recto;
    }

    /**
     * Renvoie le contenu du verso de la carte
     * @returns {String}
     */
    get verso() {
        return this.#verso;
    }

    /**
     * Fabrique la carte en HTML
     * @returns {HTMLElement}
     */
    fabriquer() {
        const carte = this._fabriquerExterieur();
        const interieur = this._fabriquerInterieur()

        interieur.appendChild(this._fabriquerRecto());
        interieur.appendChild(this._fabriquerVerso());
        carte.appendChild(interieur);

        return carte;
    }

    /**
     * Fabrique la partie extérieur de la carte
     * @returns {HTMLElement}
     */
    _fabriquerExterieur() {
        const exterieur = document.createElement("div");
        exterieur.classList.add("carte-exterieur");

        return exterieur;
    }

    /**
     * Fabrique l'enveloppe intérieur de la carte
     * @returns {HTMLElement}
     */
    _fabriquerInterieur() {
        const interieur = document.createElement("div");
        interieur.classList.add("carte-interieur");

        return interieur;
    }

    /**
     * Fabrique le recto de la carte
     * @returns {HTMLElement}
     */
    _fabriquerRecto() {
        const recto = document.createElement("div");
        const contenu = document.createElement("span");

        contenu.textContent = this.#recto;

        recto.classList.add("carte-face");
        recto.classList.add("carte-face-recto");
        recto.appendChild(contenu);

        return recto;
    }

    /**
     * Fabrique le verso de la carte
     * @returns {HTMLElement}
     */
    _fabriquerVerso() {
        const verso = document.createElement("div");
        const contenu = document.createElement("span");

        contenu.textContent = this.#verso;

        verso.classList.add("carte-face");
        verso.classList.add("carte-face-verso");
        verso.appendChild(contenu);

        return verso;
    }
}
