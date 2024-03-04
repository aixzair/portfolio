import { LiensCorrectif as LC } from "./../../controleurs/LiensCorrectif.js";

/**
 * Gènère le header de la page html.
 * @author Alexandre Lerosier
 */
export default class Header {
    static HEADER = document.querySelector('header');

    /**
     * Fabrique le header et l'ajoute à la page. La balise header doit déjà exister.
     * @returns {void}
     */
    static fabriquer() {
        const nav = document.createElement("nav");
        const nom = document.createElement("span");
        const projets = document.createElement("a");
        const profil = document.createElement("a");
        const contact = document.createElement("a");
        const cv = document.createElement("a");

        nav.classList.add("header-nav");
    
        nom.textContent = "Alexandre Lerosier";
        nom.classList.add("header-texte");
        
        profil.textContent = "Profil";
        profil.setAttribute("href", LC.corriger("/pages/profil.html"));
        profil.classList.add("header-lien");
        projets.textContent = "Projets";
        projets.setAttribute("href", LC.corriger("/pages/projets.html"));
        projets.classList.add("header-lien");
        contact.textContent = "Contact";
        contact.setAttribute("href", LC.corriger("/pages/contact.html"));
        contact.classList.add("header-lien");
        cv.textContent = "CV";
        cv.setAttribute("href", LC.corriger("/docs/cv.pdf"));
        cv.setAttribute("target", "_blank");
        cv.classList.add("header-lien");
    
        switch (this.HEADER.dataset.actif) {
        case "Projets":
            projets.classList.add("actif");
            break
        case "Profil":
            profil.classList.add("actif");
            break;
        case "Contact":
            contact.classList.add("actif");
            break;
        }
    
        nav.appendChild(nom);
        nav.appendChild(profil);
        nav.appendChild(projets);
        nav.appendChild(contact);
        nav.appendChild(cv);
    
        this.HEADER.appendChild(nav);
    }
}

/* 
Exemples :

<nav>
    <span class="header-texte">Alexandre Lerosier</span>
    <a href="/pages/profil.html" class="header-lien">Profil</a>
    <a href="/pages/projets.html" class="header-lien actif">Accueil</a>
    <a href="/pages/contact.html" class="header-lien">Contact</a>
    <a href="/docs/cv.pdf" class="header-lien" target="_blank">cv</a>
</nav>
*/
