import "./bootstrap";

const toggleButton = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("menu-mobile");

document.addEventListener("DOMContentLoaded", function () {
    const el = document.querySelector("#meu-botao");

    if (el) {
        el.addEventListener("click", () => {
            toggleButton.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
            });
        });
    }
});
