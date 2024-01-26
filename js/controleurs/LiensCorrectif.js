export class LiensCorrectif {
    static #origine = null;

    static #getOrigine() {
        let chemin = "";
    
        if (window.location.hostname.endsWith('github.io')) {
            chemin = "/portfolio";
        } else {
            chemin = "";
        }

        return chemin;
    }

    static corriger(lien) {
        if (this.#origine == null) {
            this.#origine = this.#getOrigine();
        }

        if (!lien instanceof String) {
            throw new TypeError("lien n'est pas un string");
        }

        if (!lien.startsWith("/")) {
            return lien;
        }

        return this.#origine + lien;
    }
}
