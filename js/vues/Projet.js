import Carte from "./composants/cartes/Carte.js";
import CarteCliquable from "./composants/cartes/CarteCliquable.js";
import CarteImageRecto from "./composants/cartes/CarteImageRecto.js";

/**
 * Fabrique les projet
 * @author Alexandre Lerosier
 */
export default class Projet {

    /**
     * Fabrique tous les projets
     */
    static fabriquerProjets() {
        const CARTES = document.getElementsByClassName("cartes");

        for (let cartes of CARTES) {
            const projets = cartes.querySelectorAll(".js-projet");

            projets.forEach(projet => {
                const carte = this.fabriquerCarte(projet);

                cartes.removeChild(projet);
                cartes.appendChild(carte);
            });
        }
    }

    /**
     * Fabirque une carte à partir d'un projet
     * @param {HTMLElement} projet 
     * @returns 
     */
    static fabriquerCarte(projet) {
        const recto = projet.dataset.recto;
        const verso = projet.dataset.verso;
        const href = projet.dataset.href;
        const background = projet.dataset.background;

        let carte = new Carte(recto, verso);

        if (href) {
            carte = new CarteCliquable(carte, href);
        }

        if (background) {
            carte = new CarteImageRecto(carte, background);
        }

        return carte.fabriquer();
    }
}
