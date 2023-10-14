function userMenuToggle() {
    // Active ou désactive la div "disabler"
    const toggleDisabler = document.querySelector('.disabler');
    toggleDisabler.classList.toggle('active');
    // Active ou désactive la popup
    const toggleMenu = document.querySelector('.user-menu');
    toggleMenu.classList.toggle('active');
}

function createMenu() {
    const navToggler = document.querySelector('.nav-toggler');
    const logo = document.querySelector('.logo');
    const title = document.querySelector('.menu-title');
    const menuItems = document.querySelector('.menu-items');
    const menuIcons = document.querySelector('.secondary-menu-items');
    const cart = document.querySelector('.cart-link');
    const mobileMenu = document.querySelector('.mobile-menu-items');
    const connexionWrap = document.querySelector('.connexion-wrapper');
    const secondaryConnexion = document.querySelector('.secondary-menu-connexion');

    const mediaQuery = window.matchMedia('(min-width: 767px)');

    if (mediaQuery.matches) {
        // menu 1 (Desktop)
        navToggler.style.display = 'none';
        title.style.display = 'none';
        cart.style.display = 'none';
        mobileMenu.style.display = 'none';
    } else {
        // menu 2 (Mobile)
        logo.style.display = 'none';
        menuItems.style.display = 'none';
        menuIcons.style.display = 'none';
        connexionWrap.style.display = 'none';
        secondaryConnexion.style.display = 'none';
    }
}

createMenu();

// TOGGLER MENU MOBILE
const navToggler = document.querySelector('.nav-toggler');
const navMenu = document.querySelector('.mobile-menu-items');
const navLinks = document.querySelectorAll('.mobile-navlink');

// Charger les events listeners
allEventListners();

// functions of all event listners
function allEventListners() {
    // toggler icon click event
    navToggler.addEventListener('click', togglerClick);
    // nav links click event
    navLinks.forEach((elem) => elem.addEventListener('click', navLinkClick));
}

// togglerClick function
function togglerClick() {
    navToggler.classList.toggle('toggler-open');
    navMenu.classList.toggle('open');
}

// navLinkClick function
function navLinkClick() {
    if (navMenu.classList.contains('open')) {
        navToggler.click();
    }
}
