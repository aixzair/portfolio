import ACarte from "./ACarte.js";
import { LiensCorrectif as LC } from "./../../../controleurs/LiensCorrectif.js";

/**
 * Fabrique une carte Clicable
 * @author Alexandre Lerosier
 */
export default class CarteImageRecto extends ACarte {
    #carte;
    #image;

    constructor(carte, image) {
        super();
        this.#carte = carte;
        this.#image = image;
    }

    get recto() {
        return this.#carte.recto;
    }

    get verso() {
        return this.#carte.verso;
    }

    fabriquer() {
        const carte = this._fabriquerExterieur();
        const interieur = this._fabriquerInterieur()

        interieur.appendChild(this._fabriquerRecto());
        interieur.appendChild(this._fabriquerVerso());
        carte.appendChild(interieur);

        return carte;
    }

    _fabriquerExterieur() {
        return this.#carte._fabriquerExterieur();
    }

    _fabriquerInterieur() {
        return this.#carte._fabriquerInterieur();
    }

    _fabriquerRecto() {
        const recto = document.createElement("div");
        const contenu = document.createElement("span");

        contenu.textContent = this.recto;
        contenu.classList.add("carte-image-contenu");

        recto.style.backgroundImage = `url(${LC.corriger(this.#image)})`;
        recto.style.backgroundSize = "contain";

        recto.classList.add("carte-face");
        recto.appendChild(contenu);

        return recto;
    }

    _fabriquerVerso() {
        return this.#carte._fabriquerVerso();
    }
}
