import ACarte from "./ACarte.js";

/**
 * Fabrique une carte Clicable
 * @author Alexandre Lerosier
 */
export default class CarteCliquable extends ACarte {
    #carte;
    #href;

    constructor(carte, href) {
        super();
        this.#carte = carte;
        this.#href = href;
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
        const exterieur = document.createElement("a");
        exterieur.classList.add("carte-exterieur");

        exterieur.href = this.#href;
        exterieur.classList.add("color-inherit");

        return exterieur;
    }

    _fabriquerInterieur() {
        return this.#carte._fabriquerInterieur();
    }

    _fabriquerRecto() {
        return this.#carte._fabriquerRecto();
    }

    _fabriquerVerso() {
        return this.#carte._fabriquerVerso();
    }
}
