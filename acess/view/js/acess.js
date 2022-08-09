var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");

btnSignin.addEventListener("click", function () {
    body.className = "sign-in-js";
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
});

function turnVisible() {
    //Recolhe oque está na checkbox
    var checkBox = document.getElementById("check");
    //Id do input
    var text = document.getElementById("cro");

    //Se a checkbox estiver selecionada mostra informação
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}

function cro(c) {
    cr = c.value;
    cr = cr.replace(/\D/g, "")

    cr = cr.replace(/(\d{2})(\d{2})(\d{6})$/,"$1-$2-$3")
    c.value = cr;
}