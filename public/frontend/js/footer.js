function createFooter() {


    const deskaide = document.querySelector('.desktop-footer-aide');
    const deskcompte = document.querySelector('.desktop-footer-compteaccepte');
    const desknav = document.querySelector('.desktop-footer-nav');
    const deskres = document.querySelector('.desktop-footer-resnews');

    const mobaideevent = document.querySelector('.mobile-footer-aide-event');
    const mobaccepte = document.querySelector('.mobile-footer-accepte');
    const mobres = document.querySelector('.mobile-footer-res');
    const mobnews = document.querySelector('.mobile-footer-news');
    const mobnav = document.querySelector('.mobile-footer-nav');
    const mobcompte = document.querySelector('.mobile-footer-compte');


    const mediaQuery = window.matchMedia('(min-width: 767px)');

    /*  if (mediaQuery.matches) {
         /// menu 1 (Desktop)
         mobaideevent.style.display = 'none';
         mobaccepte.style.display = 'none';
         mobres.style.display = 'none';
         mobnews.style.display = 'none';
         mobnav.style.display = 'none';
         mobcompte.style.display = 'none';
     } else {
         // menu 2 (Mobile)
         deskcompte.style.display = 'none';
         desknav.style.display = 'none';
         deskaide.style.display = 'none';
         deskres.style.display = 'none';
 
     } */

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || (mediaQuery.matches == false)) {
        deskcompte.style.display = 'none';
        desknav.style.display = 'none';
        deskaide.style.display = 'none';
        deskres.style.display = 'none';
    } else {
        mobaideevent.style.display = 'none';
        mobaccepte.style.display = 'none';
        mobres.style.display = 'none';
        mobnews.style.display = 'none';
        mobnav.style.display = 'none';
        mobcompte.style.display = 'none';
    }

    const mobaide = document.querySelector('.mobile-footer-aide');
    mobaide.style.display = 'none';
    const mobaideh3 = document.querySelector('.h3-mobile-footer-aide');

    // On récupère l'élément sur lequel on veut détecter le clic
    mobaideevent.addEventListener('click', function () {          // On écoute l'événement click
        mobaide.style.display = 'flex';               // On change le contenu
        mobaideevent.style.display = 'none';
    });


    mobaideh3.addEventListener('click', function () {          // On écoute l'événement click
        mobaide.style.display = 'none';               // On change le contenu
        mobaideevent.style.display = 'flex';
    });


    const mobnave = document.querySelector('.mobile-footer-nav-event');
    mobnave.style.display = 'none';
    const mobnaveh3 = document.querySelector('.h3-mobile-footer-nav-event');

    // On récupère l'élément sur lequel on veut détecter le clic
    mobnav.addEventListener('click', function () {          // On écoute l'événement click
        mobnave.style.display = 'flex';               // On change le contenu
        mobnav.style.display = 'none';
    });


    mobnaveh3.addEventListener('click', function () {          // On écoute l'événement click
        mobnave.style.display = 'none';               // On change le contenu
        mobnav.style.display = 'flex';
    });


    const mobcompteevent = document.querySelector('.mobile-footer-compte-event');
    mobcompteevent.style.display = 'none';
    const mobcompteeventh3 = document.querySelector('.h3-mobile-footer-compte-event');

    // On récupère l'élément sur lequel on veut détecter le clic
    mobcompte.addEventListener('click', function () {          // On écoute l'événement click
        mobcompteevent.style.display = 'flex';               // On change le contenu
        mobcompte.style.display = 'none';
    });


    mobcompteeventh3.addEventListener('click', function () {          // On écoute l'événement click
        mobcompteevent.style.display = 'none';               // On change le contenu
        mobcompte.style.display = 'flex';
    });

}
createFooter();