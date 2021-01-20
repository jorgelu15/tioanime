const nombre = document.getElementById("nombreCap");
const url = document.getElementById("url");
const anime = document.getElementById("anime");
const btn = document.getElementById("addCap");
const errores = document.getElementById('errores');
const form = document.getElementById('formAddCap');

btn.addEventListener('click', e => {
    e.preventDefault();
    if(nombre.value == '' || url.value == '' || anime.value == ''){
        errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
    } else {
        form.submit();
    }
});