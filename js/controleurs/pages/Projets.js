import {Projet} from "./../../vues/composants/Projet.js";

/**
 * Les actions spécifiques à la pages projets.html
 * @author Alexandre Lerosier
 */
export class Projets {

    /**
     * Exécute les actions
     * @returns {void}
     */
    static executer() {
        Projet.fabriquerTout();
    }
}
