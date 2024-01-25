// ------------------------------ Constantes -----------------------------------
const HEADER = document.querySelector('header');

// ------------------------------ Actions --------------------------------------
fabriquerheader();

// ------------------------------ Fonctions ------------------------------------

function fabriquerheader() {
    const nav = document.createElement("nav");
    const nom = document.createElement("span");
    const projets = document.createElement("a");
    const profil = document.createElement("a");
    const contact = document.createElement("a");

    nom.textContent = "Alexandre Lerosier";
    profil.textContent = "Profil";
    profil.setAttribute("href", "/index.html");
    projets.textContent = "Projets";
    projets.setAttribute("href", "/pages/projets.html")
    contact.textContent = "Contact";
    contact.setAttribute("href", "/pages/contact.html");

    switch (HEADER.dataset.actif) {
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

    HEADER.appendChild(nav);
}
