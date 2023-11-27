/**
 * Veille au bon fonctionnement des liens symbolique sur l'ensemble de la page.
*/

/* ---------------------------- Actions ------------------------------ */

// ajuste les script
console.log("a");
let i = 1;
document.querySelectorAll('script').forEach(function(script) {
    if (script.src.startsWith(window.location.origin)) {
        const path = script.src.substring(window.location.origin.length);
        const reelPath = getReelPath();
        script.src = path.startsWith(getReelPath()) ? path : reelPath + path;
        console.log("i = " + i);
        console.log("path = " + path);
        i++;
    }
});
console.log("b");

// ajuste les liens
document.querySelectorAll('link').forEach(function(link) {
    if (link.href.startsWith(window.location.origin)) {
        const path = link.href.substring(window.location.origin.length);
        const reelPath = getReelPath();
        link.href = path.startsWith(reelPath) ? path : reelPath + path;
    }
});

console.log("d");
if (getReelPath() !== '') {
    // console.clear();
    reloadScripts();
    console.log("Chargement effectué avec succès.")
}

/* ---------------------------- Evenements --------------------------- */

// ajuste les liens a
document.addEventListener('load', function() {
    document.querySelectorAll('a').forEach(function(link) {
        if (link.href.startsWith(window.location.origin)) {
            link.href = getReelPath() + link.pathname + link.search + link.hash;
        }
    });
});

/* ---------------------------- Fonctions ---------------------------- */

/**
 * Indique si c'est une github pages
 * @returns boolean
 */
function isGitHubPages() {
    return window.location.hostname.endsWith('github.io');
}

/**
 * Revoie le liens symbolique
 * @returns le lien
 */
function getReelPath() {
    return isGitHubPages() ? '/portfolio' : '';
}

/**
 * Recharge les autres script de la pages
 */
function reloadScripts() {
    const scripts = document.querySelectorAll('script');
    const scriptActuel = document.currentScript;

    scripts.forEach(function(script) {
        if (script !== scriptActuel) {
            const nouveauScript = document.createElement('script');
            nouveauScript.src = script.src;
            nouveauScript.defer = script.defer;
            document.head.appendChild(nouveauScript);
        }
    });
}
