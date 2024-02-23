import ACarte from "./ACarte.js";

/* Exemple de carte fabriqué :

<a href="mon lien" class="carte-interieur">
    <div class="carte-exterieur">
        <div class="carte-face carte-face-recto">
            <span>contenu du recto</span>
        </div>
        <div class="carte-face carte-face-verso">
            <span>contenu du verso</span>
        </div>
    </div>
</a>

*/

/**
 * Fabrique une carte Cliquable
 * @author Alexandre Lerosier
 */
export default class CarteCliquable extends ACarte {
    #carte;
    #href;

    /**
     * Fabrique une carte js cliquable
     * @param {ACarte} carte 
     * @param {String} href 
     */
    constructor(carte, href) {
        super();
        this.#carte = carte;
        this.#href = href;
    }

    /**
     * Renvoie le contenu du recto
     * @returns {String}
     */
    get recto() {
        return this.#carte.recto;
    }

    /**
     * Renvoie le contenu du verso
     * @returns {String}
     */
    get verso() {
        return this.#carte.verso;
    }

    /**
     * Fabrique une carte HTML cliquable
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
     * Fabrique l'exterieur de la carte cliquable
     * @returns {HTMLElement}
     */
    _fabriquerExterieur() {
        const exterieur = document.createElement("a");
        exterieur.classList.add("carte-exterieur");

        exterieur.href = this.#href;
        exterieur.classList.add("color-inherit");

        return exterieur;
    }

    /**
     * Fabrique l'envelope intérieur de la carte
     * @returns {HTMLElement}
     */
    _fabriquerInterieur() {
        return this.#carte._fabriquerInterieur();
    }

    /**
     * Fabrique la face recto de la carte
     * @returns {HTMLElement}
     */
    _fabriquerRecto() {
        return this.#carte._fabriquerRecto();
    }

    /**
     * Fabrique la face verso de la carte
     * @returns {HTMLElement}
     */
    _fabriquerVerso() {
        return this.#carte._fabriquerVerso();
    }
}
