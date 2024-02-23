/**
 * Classe "abstraite" permetant de fabriquer une carte HTML
 * @author Alexandre Lerosier
 */
export default class ACarte {

    constructor() {
        if (new.target === ACarte) {
            throw new Error("ACarte ne peut pas être instanciée directement. Elle doit être étendue.");
        }
    }

    get recto() {
        throw new Error("La getter recto doit être implémentée.");
    }

    get verso() {
        throw new Error("La getter verso doit être implémentée.");
    }

    fabriquer() {
        throw new Error("La méthode fabriquer doit être implémentée.");
    }

    _fabriquerExterieur() {
        throw new Error("La méthode fabriquerExterieur doit être implémentée.");
    }

    _fabriquerInterieur() {
        throw new Error("La méthode fabriquerInterieur doit être implémentée.");
    }

    _fabriquerRecto() {
        throw new Error("La méthode fabriquerRecto doit être implémentée.");
    }

    _fabriquerVerso() {
        throw new Error("La méthode fabriquerVerso doit être implémentée.");
    }
}
