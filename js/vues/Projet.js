import Carte from "./composants/cartes/Carte.js";
import CarteCliquable from "./composants/cartes/CarteCliquable.js";
import CarteImageRecto from "./composants/cartes/CarteImageRecto.js";

/**
 * Fabrique des cartes cliquable représentant des projets
 * @author Alexandre Lerosier
 */
export default class Projet {

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

/**
     * Créer un background à un élément
     * @param {HTMLElement} face - Elément HTML
     * @param {String} lien - Lien vers le background
     */
    /*#creerBackground(face, lien) {
        
        //face.style.opacity = "0.5";
        //face.style.filter = "blur(1px)";

        //face.style.filter = "grayscale(80%)"; // filter: blur(5px);
        // face.style.padding = "30%";
        face.style.color = "var(--color-primary)";
    }*/
