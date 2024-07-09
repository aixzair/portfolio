export default class HtmlBuilder {

    /**
     * Créé un input
     * @param {string} type type de l'input (peut être textarea)
     * @returns {HTMLTextAreaElement|HTMLInputElement}
     */
    static creerInput(type) {
        if (type === 'textarea') {
            return document.createElement('textarea');
        }

        const input = document.createElement('input');
        input.type = type;

        return input;
    }

    /**
     * Créer un input et son label pour un formulaire
     * @param {string} type type de l'input (peut être textarea)
     * @param {string} nom nom de l'input
     * @param {string} labelText texte du label
     * @returns {HTMLDivElement} ensemble de l'input
     */
    static creerInputGroup(type, nom, labelText) {
        const groupe = document.createElement('div');
        groupe.classList.add('input-group');

        const label = document.createElement('label');
        label.classList.add('input-group-text');
        label.textContent = labelText;
        label.htmlFor = nom;

        const input = HtmlBuilder.creerInput(type);
        input.classList.add('form-control');
        input.name = nom;

        groupe.appendChild(label);
        groupe.appendChild(input);

        return groupe;
    }
}