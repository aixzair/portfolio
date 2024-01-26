/**
 * Corrige les liens relatifs au projet si celui-ci change (exemples : GitHub pages)
 * @author Alexandre Lerosier
 */
export class LiensCorrectif {
    static #origine = null;

    /**
     * Trouve l'origine du projet
     * @returns {String}
     */
    static #getOrigine() {
        let chemin = "";
    
        if (window.location.hostname.endsWith('github.io')) {
            chemin = "/portfolio";
        } else {
            chemin = "";
        }

        return chemin;
    }

    /**
     * Corrige le lien avec l'origine du projet.
     * ATTENTION : ne prend pas en charge les dossiers portant le même nom
     * que le dossier racine.
     * @param {String} lien 
     * @returns le lien corrigé
     */
    static corriger(lien) {
        if (this.#origine == null) {
            this.#origine = this.#getOrigine();
        }

        if (!lien instanceof String) {
            throw new TypeError("lien n'est pas un string");
        }

        if (!lien.startsWith("/") || lien.startsWith(this.#origine)) {
            return lien;
        }

        return this.#origine + lien;
    }
}
