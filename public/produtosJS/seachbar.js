const input = document.getElementById("searchBar");
input.addEventListener("keyup", search);

var cat = [];
var presentes = [];

function filterCB(checkboxElem) {
    const catElements = document.getElementsByClassName("categorias");

    var elementoNome = checkboxElem.name.toLowerCase();

    if (checkboxElem.checked) {
        cat.push(checkboxElem.name);

        for (i = 0; i < catElements.length; i++) {
            if (catElements[i].innerHTML.toLowerCase() == elementoNome) {
                presentes.push(i);
            }
        }
    } else {
        var index = cat.indexOf(checkboxElem.name);
        if (index != -1) {
            cat.splice(index, 1);
        }

        for (i = 0; i < catElements.length; i++) {
            if (catElements[i].innerHTML.toLowerCase() == elementoNome) {
                presentes.splice(presentes.indexOf(i), 1);
            }
        }
    }

    search();
}

function search() {
    const inputVal = input.value;
    const elements = document.getElementsByClassName("nomes");

    for (i = 0; i < elements.length; i++) {
        if (
            elements[i].innerHTML.toLowerCase().includes(inputVal) &&
            (presentes.indexOf(i) != -1 || cat.length == 0)
        ) {
            elements[i].parentElement.style.display = "";
        } else {
            elements[i].parentElement.style.display = "none";
        }
    }
}
