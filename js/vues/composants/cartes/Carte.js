import ACarte from "./ACarte.js";

// HTMLElement

/**
 * Fabrique une carte HTML
 * @author Alexandre Lerosier
 */
export default class Carte extends ACarte {
    #recto;
    #verso;

    constructor(recto, verso) {
        super();
        this.#recto = recto;
        this.#verso = verso;
    }

    get recto() {
        return this.#recto;
    }

    get verso() {
        return this.#verso;
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
        const exterieur = document.createElement("div");
        exterieur.classList.add("carte-exterieur");

        return exterieur;
    }

    _fabriquerInterieur() {
        const interieur = document.createElement("div");
        interieur.classList.add("carte-interieur");

        return interieur;
    }

    _fabriquerRecto() {
        const recto = document.createElement("div");
        const contenu = document.createElement("span");

        contenu.textContent = this.#recto;

        recto.classList.add("carte-face");
        recto.classList.add("carte-face-recto");
        recto.appendChild(contenu);

        return recto;
    }

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

/* Exemple -----------------------------------
<div class="carte-interieur">
    <div class="carte-exterieur">
        <div class="carte-recto">
            <h2>sldfj</h2>
        </div>
        <div class="carte-verso">
            <h2>sdlkjf</h2>
        </div>
    </div>
</div>
*/
