//Se realiza el respectivo proceso para realizar la animación del menú
const menuToggle = document.querySelector(".menuToggle");
const navigation = document.querySelector(".navigation");
const contenido = document.querySelector(".contenido");

//Al realizar click en el elemento menuToggle se agrega y se quita una clase open
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
    //Si se clickea el boton con la clase 'is-danger' (-)
    if(e.target.classList.contains('is-danger')){
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML>0){
            span.innerHTML--;
        }
    } 
    //Si se clickea el boton con la clase 'is-primary' (+)
    else if(e.target.classList.contains('is-primary')){
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML<99){
            span.innerHTML++;
        }
    } 
    //Si se clickea el boton con la clase 'is-success' (Comprar)
    else if(e.target.classList.contains('is-success')){
        //Si la cantidad a comprar es 0
        const span = document.getElementById(`sp-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
        if(span.innerHTML == 0){
            const adver = document.getElementById('advertencia');
            adver.classList.add('is-active');
        } 
        //De lo contrario se envian los datos a agregarCarrito.php mediante metodo GET
        else {
            const id = document.getElementById(`id-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
            const desc = document.getElementById(`desc-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);
            const precio = document.getElementById(`price-${"" + e.target.id[e.target.id.length-2] + e.target.id[e.target.id.length-1]}`);

            const urlAgregar = `./agregarCarrito.php?id=${id.innerHTML.trim()}&desc=${desc.innerHTML.trim()}&cant=${span.innerHTML}&precio=${precio.innerHTML.trim()}`;
            window.location.href = urlAgregar;
        }
    } 
}

//Se llama al elemento con el id = "advertencia"
const modal = document.getElementById('advertencia');

//Funcion para cerrar el modal
modal.addEventListener('click',e => {
    cerrarModal(e);
})

//Se elimina la clase 'is-active' y de esta manera se cierra el modal
function cerrarModal(e){
    if(e.target.classList.contains('delete')){
        const adver = document.getElementById('advertencia');
        adver.classList.remove('is-active');
    }
}
