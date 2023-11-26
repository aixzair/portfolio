/**
 * Veille au bon fonctionnement des liens symbolique sur l'ensemble de la page.
*/

/* ---------------------------- Actions ------------------------------ */

console.log("debug");

// ajuste les script
document.querySelectorAll('script').forEach(function(script) {
    if (script.src.startsWith(window.location.origin)) {
        script.src = getPath() + script.src;
        console.log(script.src + " evenement");
    }
});

// ajuste les liens
document.querySelectorAll('link').forEach(function(link) {
    if (link.href.startsWith(window.location.origin)) {
        link.href = getPath() + link.href;
        console.log(link.href + " link");
    }
});

/* ---------------------------- Evenements --------------------------- */

document.addEventListener('load', function() {
    document.querySelectorAll('a').forEach(function(link) {
        if (link.href.startsWith(window.location.origin)) {
            link.href = getPath() + link.pathname + link.search + link.hash;
        }
    });
});

/* ---------------------------- Fonctions ---------------------------- */

/**
 * Indique si c'est une github pages
 * @returns boolean
 */
function isGitHubPages() {
    console.log("test");
    return window.location.hostname.endsWith('github.io');
}

/**
 * Revoie le liens symbolique
 * @returns le lien
 */
function getPath() {
    return isGitHubPages() ? '/portfolio' : '';
}
