
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

//Se llama el elemento con el id="tabla-articulos"
const tabla = document.getElementById("tabla-articulos");

tabla.addEventListener('click', e=>{
    eliminarArticulo(e);
})

function eliminarArticulo(e){
    let idBoton = "" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1];
    //Se detecta si se oprime el boton "el#-##"
    if(e.target.id == `el1-${idBoton}` || e.target.id == `el2-${idBoton}` || e.target.id == `el3-${idBoton}`){
        idBoton = parseInt(idBoton,10);
        const idProducto = document.getElementById(idBoton);

        //Se crea la URL con el id y se redirecciona a eliminarArticulo.php
        const urlEliminar = `./eliminarArticulo.php?id=${idProducto.innerHTML.trim()}`;
        window.location.href = urlEliminar;
    }
}