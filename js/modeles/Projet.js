export default class Projet {
    // Classe -------------------------------------------------------------------------------------

    static getProjet(nom) {
        const projet = new Projet();


        return projet;
    }

    // Instance -----------------------------------------------------------------------------------
    #nom;
    #date;
    #images_nb;
    #liens;
    #points_techniques;
    #presentation;

    constructor(
        nom = "", date = "", images_nb = "", liens = [], points_techniques = [],
        presentation = ""
    ) {
        this.#nom = nom;
        this.#date = date;
        this.#images_nb = images_nb;
        this.#liens = liens;
        this.#points_techniques = points_techniques;
        this.#presentation = presentation;
    }
}
