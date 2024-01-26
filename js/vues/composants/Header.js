import { LiensCorrectif as LC } from "./../../controleurs/LiensCorrectif.js";

export class Header {
    static HEADER = document.querySelector('header');

    static fabriquer() {
        const nav = document.createElement("nav");
        const nom = document.createElement("span");
        const projets = document.createElement("a");
        const profil = document.createElement("a");
        const contact = document.createElement("a");
    
        nom.textContent = "Alexandre Lerosier";
        profil.textContent = "Profil";
        profil.setAttribute("href", LC.corriger("/pages/profil.html"));
        projets.textContent = "Projets";
        projets.setAttribute("href", LC.corriger("/pages/projets.html"))
        contact.textContent = "Contact";
        contact.setAttribute("href", LC.corriger("/pages/contact.html"));
    
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
    
        this.HEADER.appendChild(nav);
    }
}
