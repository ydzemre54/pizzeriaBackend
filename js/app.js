const container = document.querySelector(".container");

(async function recupererPlusieurs() {
    try {
        const resultats = await Promise.all([
            fetch("marguerita.json"),
            fetch("4fromage.json"),
            fetch("bbq.json"),
            fetch("saumon.json"),
            fetch("chevre-miel.json"),
        ]);

        const dataJson = await Promise.all(
            resultats.map(res => res.json())
        );
        afficherContenu(dataJson);
        


    } catch (erreur) {
        console.error(erreur);
    }
}());

function afficherContenu(dataJson) {
    
    const monFiltre = document.getElementById("filtre");
    const filter = monFiltre.selectedIndex;

    for (let i = 0; i < dataJson.length; i++) {
        const maCard = document.createElement("div");
        let monImage = document.createElement("img");
        monImage.setAttribute("src", dataJson[i].image);
        monImage.setAttribute("alt", dataJson[i].alt);
        let monCardBody = document.createElement("div");
        let monh5 = document.createElement("h5");
        monh5.textContent = (dataJson[i].nom);
        let maBase = document.createElement("p");
        maBase.textContent = ("Base: " + dataJson[i].base);
        let mesIngredients = document.createElement("p");
        mesIngredients.textContent = (dataJson[i].ingredients);
        let prix = document.createElement("h4");
        prix.textContent = (dataJson[i].prix + dataJson[i].devise);

        container.classList.add("card", "bg-dark", "text-light",);
        maCard.classList.add("card-img-top")
        maCard.classList.add("col-2")
        monCardBody.classList.add("card-body");
        monh5.classList.add("card-text");

        container.appendChild(maCard);
        maCard.appendChild(monImage);
        maCard.appendChild(monCardBody);
        monCardBody.appendChild(monh5);
        monCardBody.appendChild(maBase);
        monCardBody.appendChild(mesIngredients);
        monCardBody.appendChild(prix);
       
       
    }
   
}


/*const boutonTomate = document.getElementsByClassName("tomate");
const boutonCreme = document.getElementsByClassName("creme");

function filtrerTomate() {
    if (dataJson[i].base == "crème fraîche") {
        maCard.classList.add("highlight");
    }
}

boutonTomate.addEventListener("click", filtrerTomate);
*/




















