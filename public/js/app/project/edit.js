const LINKS = document.getElementById('links');
const LINK_ADD_BUTTON = document.getElementById('link-add');
const LINK_TEMPLATE = document.getElementById('link-template').content.firstElementChild;
const TOOLS = document.getElementById('tools');
const TOOL_ADD_BUTTON = document.getElementById('tool-add');
const TOOL_TEMPLATE = document.getElementById('tool-template').innerHTML;

let nextLinkNumber = LINKS.children.length;
let nextToolNumber = TOOLS.children.length;

LINK_ADD_BUTTON.addEventListener('click', () => {
    const number = nextLinkNumber++;

    // Add a new element
    const link = LINK_TEMPLATE.cloneNode(true);
    link.innerHTML = link.innerHTML.replace(/__INDEX__/g, String(number));
    LINKS.appendChild(link);

    // Add event to delete element
    const button = document.getElementById(`links[${number}][cancel]`)
    button.addEventListener('click', () => {
        link.remove();
    });
});

TOOL_ADD_BUTTON.addEventListener('click', () => {
    const tool = TOOL_TEMPLATE.replace(/__INDEX__/g, String(nextToolNumber++));
    TOOLS.insertAdjacentHTML('beforeend', tool);
});