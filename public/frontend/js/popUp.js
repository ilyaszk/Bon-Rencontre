let actionBouton = document.getElementsByClassName("ajout");
let popUp = document.getElementById("popUp");
let bContinuer = document.getElementById("continuer");

var myFunction = function () {
    var attribute = this.getAttribute("data-myattribute");
    alert(attribute);
};

for (var i = 0; i < actionBouton.length; i++) {
    actionBouton[i].addEventListener('click', function () {
        popUp.style.transitionDelay = '0.45s';
        popUp.style.opacity = '1';
        popUp.style.zIndex = '2';
    });
}

bContinuer.addEventListener('click', function () {
    popUp.style.opacity = '0';
    popUp.style.zIndex = '-1';
    popUp.style.transitionDelay = '0s';

});