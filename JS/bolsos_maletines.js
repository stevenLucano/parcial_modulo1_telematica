//Inicializacion del navBar de Bulma CSS
document.addEventListener('DOMContentLoaded', () => {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }
});

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

//Cambiar el numero de la cantidad que se desea comprar
contenido.addEventListener('click', e => {
    cambiarCantidad(e)
});

function cambiarCantidad(e){
    console.log(e.target.id);
    if(e.target.classList.contains('is-danger')){
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML>0){
            span.innerHTML--;
        }
    } else if(e.target.classList.contains('is-primary')){
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML<99){
            span.innerHTML++;
        }
    } else if(e.target.classList.contains('is-success')){
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML == 0){
            console.log("No se puede comprar ome");
            const adver = document.getElementById('advertencia');
            adver.classList.add('is-active');
        } else {
            const id = document.getElementById(`id-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
            const desc = document.getElementById(`desc-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
            const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
            const urlAgregar = `./agregarCarrito.php?id=${id.innerHTML.trim()}&desc=${desc.innerHTML.trim()}&cant=${span.innerHTML}`;
            window.location.href = urlAgregar;
        }
    } 
}

const modal = document.getElementById('advertencia');

//Funcion para cerrar el modal
modal.addEventListener('click',e => {
    cerrarModal(e);
})

function cerrarModal(e){
    if(e.target.classList.contains('delete')){
        const adver = document.getElementById('advertencia');
        adver.classList.remove('is-active');
    }
}
