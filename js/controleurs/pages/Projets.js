import Projet from "./../../vues/Projet.js";

/**
 * Les actions spécifiques à la pages projets.html
 * @author Alexandre Lerosier
 */
export default class Projets {

    /**
     * Exécute les actions
     * @returns {void}
     */
    static executer() {
        Projet.fabriquerProjets();
    }

    static afficherProjets() {
        
    }

    static afficherProjet(url) {

    }
}
