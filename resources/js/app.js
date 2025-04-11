import "./bootstrap";

const toggleButton = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("menu-mobile");

toggleButton.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
});
