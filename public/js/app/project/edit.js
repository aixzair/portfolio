// Links -------------------------------------------------------------------------------------------

document.querySelectorAll('[data-link-delete]').forEach(button => {
    button.addEventListener('click', event => {
        const projet = event.target.closest('[data-link]');
        const disabled = projet.dataset.link === 'false';

        projet.querySelectorAll('input').forEach(input => {
            input.disabled = disabled;
        });

        projet.dataset.link = disabled
            ? "true"
            : "false";
    });
});

// Tools -------------------------------------------------------------------------------------------

document.querySelectorAll('[data-tool-delete]').forEach(button => {
    button.addEventListener('click', event => {
        const projet = event.target.closest('[data-tool]');
        const disabled = projet.dataset.tool === 'false';

        projet.querySelectorAll('input').forEach(input => {
            input.disabled = disabled;
        });

        projet.dataset.tool = disabled
            ? "true"
            : "false";
    });
});

// Links DForm -------------------------------------------------------------------------------------

const LINKS = document.getElementById('links');
const LINK_ADD_BUTTON = document.getElementById('link-add');
const LINK_TEMPLATE = document.getElementById('link-template')
    .content.firstElementChild;

let nextLinkNumber = LINKS.children.length;

// Insert a form for a new link
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

// Tools DForm -------------------------------------------------------------------------------------

const TOOLS = document.getElementById('tools');
const TOOL_ADD_BUTTON = document.getElementById('tool-add');
const TOOL_TEMPLATE = document.getElementById('tool-template')
    .content.firstElementChild;

let nextToolNumber = TOOLS.children.length;

// Insert a new form for a tool
TOOL_ADD_BUTTON.addEventListener('click', () => {
    const number = nextToolNumber++;

    // Add a new element
    const tool = TOOL_TEMPLATE.cloneNode(true);
    tool.innerHTML = tool.innerHTML.replace(/__INDEX__/g, String(number));
    TOOLS.appendChild(tool);

    // Add event to delete element
    const button = document.getElementById(`tools[${number}][cancel]`);
    button.addEventListener('click', () => {
        tool.remove();
    });
});
