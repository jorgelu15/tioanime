const nombre = document.getElementById("nombre");
const img = document.getElementById("img");
const miniatura = document.getElementById("miniatura");
const btn = document.getElementById("addanime");
const errores = document.getElementById('errores');
const form = document.getElementById('formAddAnime');

btn.addEventListener('click', e => {
    e.preventDefault();
    if(nombre.value == '' || img.value == '' || miniatura.value == ''){
        errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
    } else {
        form.submit();
    }
});