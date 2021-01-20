"use strict";

var nombre = document.getElementById("nombre");
var img = document.getElementById("img");
var miniatura = document.getElementById("miniatura");
var btn = document.getElementById("addanime");
var errores = document.getElementById('errores');
var form = document.getElementById('formAddAnime');
btn.addEventListener('click', function (e) {
  e.preventDefault();

  if (nombre.value == '' || img.value == '' || miniatura.value == '') {
    errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
  } else {
    form.submit();
  }
});