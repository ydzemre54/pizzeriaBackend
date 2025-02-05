const recu = document.getElementById("recu");
const commande = document.getElementById("ma-liste");
const monBouton = document.getElementById("valider-commande");
const monBoutonTerminer = document.getElementById("terminer-commande");

function alterne() {
    commande.classList.toggle("prepa");
}

monBouton.addEventListener("click", alterne);

function alterne2() {
    commande.classList.toggle("termine");
}

monBoutonTerminer.addEventListener("click", alterne2);