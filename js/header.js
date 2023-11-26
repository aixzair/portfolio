// ------------------------------ Constantes -----------------------------------
const HEADER = document.querySelector('header');

// ------------------------------ Actions --------------------------------------

fabriquerheader();

// ------------------------------ Fonctions ------------------------------------

function fabriquerheader() {
    const nav = document.createElement("nav");
    const nom = document.createElement("span");
    const accueil = document.createElement("a");
    const profil = document.createElement("a");
    const contact = document.createElement("a");

    nom.textContent = "Alexandre Lerosier";
    accueil.textContent = "Accueil";
    accueil.setAttribute("href", "/index.html")
    profil.textContent = "Profil";
    profil.setAttribute("href", "/pages/profil.html");
    contact.textContent = "Contact";
    contact.setAttribute("href", "/pages/contact.html");

    switch (HEADER.dataset.actif) {
    case "Accueil":
        accueil.classList.add("actif");
        break
    case "Profil":
        profil.classList.add("actif");
        break;
    case "Contact":
        contact.classList.add("actif");
        break;
    }

    nav.appendChild(nom);
    nav.appendChild(accueil);
    nav.appendChild(profil);
    nav.appendChild(contact);

    HEADER.appendChild(nav);
}
