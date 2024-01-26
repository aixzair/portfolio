export class Projet {
    // Classe -------------------------------------------------------
    static fabriquerTout() {
        const PROJETS_HTML = document.getElementById("projets");
        const projets = document.getElementsByClassName("js-projet");

        for (const i = 0; projets.length > 0;) {
            const projetHTML = (new Projet(
                projets[i].dataset.href,
                projets[i].dataset.recto,
                projets[i].dataset.verso
            )).fabriquer();

            PROJETS_HTML.removeChild(projets[i]);
            PROJETS_HTML.appendChild(projetHTML);
        }
    }

    // Instance -----------------------------------------------------

    #href;
    #recto;
    #verso;

    constructor(href, recto, verso) {
        this.#href = href;
        this.#recto = recto;
        this.#verso = verso;
    }

    fabriquer() {
        const projet = document.createElement("div");
        const lien = document.createElement("a");
        const carte = document.createElement("div");
        const recto = this.#creerFaceHTML(this.#recto);
        const verso = this.#creerFaceHTML(this.#verso);

        recto.classList.add("carte-recto");
        carte.appendChild(recto);

        verso.classList.add("carte-verso");
        carte.appendChild(verso);

        carte.classList.add("carte");
        lien.appendChild(carte);

        lien.href = this.#href;
        projet.appendChild(lien);

        projet.classList.add("projet");

        return projet;
    }

    #creerFaceHTML(texte) {
        const face = document.createElement("div");
        const contenu = document.createElement("h2");

        contenu.textContent = texte;
        face.appendChild(contenu);

        return face;
    }
}

/* Exemple -----------------------------------
<div
    class="js-projet"
    data-href="./projets/pomodoro.html"
    data-recto="Pomodoro"
    data-verso="Un outils pour gérer votre temps de travail et de repos"
>
</div>

<div class="projet">
    <a href="./projets/pomodoro.html">
        <div class="carte">
            <div class="carte-recto">
                <h2>Pomodoro</h2>
            </div>
            <div class="carte-verso">
                <h2>Un outils pour gérer votre temps de travail et de repos</h2>
            </div>
        </div>
    </a>
</div>
*/
