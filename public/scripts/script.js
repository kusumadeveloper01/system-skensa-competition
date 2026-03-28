// import ApexCharts from 'apexcharts'

// Chosen Js

// $('#selectOptionPelanggan').chosen()

let eyeIconBtn = document.getElementById("eyeIcon");
let eye = document.getElementById("eye");
let passInput = document.getElementById("password");

// eyeIcon.addEventListener("click", function(){
//     console.log(eyeIcon)
// if(passInput.type == "password"){
//     passInput.type =  "text"
// }else{
//     passInput.type = "password"
// }
// })

function controlEye() {
    console.log(eyeIcon);

    if (passInput.type == "password") {
        passInput.type = "text";
        eyeIconBtn.classList.remove("bg-visibility-off");
        eyeIconBtn.classList.add("bg-visibility");
    } else {
        passInput.type = "password";
        eyeIconBtn.classList.remove("bg-visibility");
        eyeIconBtn.classList.add("bg-visibility-off");
    }
}

function showNav() {
    const nav = document.getElementById("nav-mobile");
    nav.classList.toggle("nav-hidden");
}

function closeNav() {
    const nav = document.getElementById("nav-mobile");
    nav.classList.add("nav-hidden");
}