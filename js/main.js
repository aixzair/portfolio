// Programme principal

import Projets from "./controleurs/pages/Projets.js";

import { Header } from "./vues/composants/Header.js";


Header.fabriquer();


switch (window.location.pathname.split("/").reverse()[0]) {
case "projets.html":
    Projets.executer();
    break;
}
