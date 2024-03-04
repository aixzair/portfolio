// Programme principal

import Header from "./vues/composants/Header.js";
import Footer from "./vues/composants/Footer.js";

import Projets from "./controleurs/pages/Projets.js";

Header.fabriquer();
Footer.fabriquer();

switch (window.location.pathname.split("/").reverse()[0]) {
case "projets.html":
    Projets.executer();
    break;
}
