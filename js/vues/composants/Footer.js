/**
 * Gènère le footer de la page html.
 * @author Alexandre Lerosier
 */
export default class Footer {
    static BODY = document.querySelector("body");

    /**
     * Fabrique le footer et l'ajoute à la page. La balise footer est créé.
     * @returns {void}
     */
    static fabriquer() {
        const footer = document.createElement("footer");
        const span = document.createElement("span");

        span.textContent = "Alexandre Lerosier";
        footer.appendChild(span);

        this.BODY.appendChild(footer);
    }
}
