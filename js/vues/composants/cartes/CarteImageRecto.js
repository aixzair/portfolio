import ACarte from "./ACarte.js";
import { LiensCorrectif as LC } from "./../../../controleurs/LiensCorrectif.js";

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
 * Fabrique une carte avec un image comme recto
 * @author Alexandre Lerosier
 */
export default class CarteImageRecto extends ACarte {
    #carte;
    #image;

    /**
     * Fabrique la carte
     * @param {ACarte} carte - carte de base
     * @param {String} image - lien de l'image
     */
    constructor(carte, image) {
        super();
        this.#carte = carte;
        this.#image = image;
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
     * Fabrique la carte
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
     * Fabrique l'exterieur de la carte
     * @returns {HTMLElement}
     */
    _fabriquerExterieur() {
        return this.#carte._fabriquerExterieur();
    }

    /**
     * Fabrique l'intérieur de la carte
     * @returns {HTMLElement}
     */
    _fabriquerInterieur() {
        return this.#carte._fabriquerInterieur();
    }

    /**
     * Fabrique le recto de la carte
     * @returns {HTMLElement}
     */
    _fabriquerRecto() {
        const recto = document.createElement("div");
        const contenu = document.createElement("span");

        contenu.textContent = this.recto;
        contenu.classList.add("carte-face-image-contenu");

        recto.style.backgroundImage = `url(${LC.corriger(this.#image)})`;

        recto.classList.add("carte-face");
        recto.classList.add("carte-face-recto");
        recto.classList.add("carte-face-image");
        recto.appendChild(contenu);

        return recto;
    }

    /**
     * Fabrique le verso de la carte
     * @returns {HTMLElement}
     */
    _fabriquerVerso() {
        return this.#carte._fabriquerVerso();
    }
}
