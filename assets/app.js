import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


const nav = document.getElementById('offcanvasNavbar');
const li = document.querySelectorAll('li'); 

if (window.matchMedia("(min-width:1200px)").matches) {
    nav.classList.add('show'); //la nav reste ouverte grâce à l'ajout de la class show
    
    // li.forEach(function (allLi) { //selectionne tout les li grace au foreach qui parcours le tableau (nodelist) de querySelectorAll (un tableau avec tout les li)
    //     allLi.removeAttribute("data-bs-dismiss"); //enlève l'attribut data-bs-dismiss qui en mobile sert à ferme la nav quand on clique sur un lien
    // });
};