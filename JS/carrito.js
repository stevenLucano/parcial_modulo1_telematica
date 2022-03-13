
//Se realiza el respectivo proceso para realizar la animación del menú
const menuToggle = document.querySelector(".menuToggle");
const navigation = document.querySelector(".navigation");
const contenido = document.querySelector(".contenido");

menuToggle.onclick = function() {
    navigation.classList.toggle("open");
    contenido.classList.toggle("open");
}

const list = document.querySelectorAll(".list");

function activeLink() {
    list.forEach(item => item.classList.remove("active"));
    this.classList.add('active');
}
list.forEach(item => item.addEventListener('click', activeLink));