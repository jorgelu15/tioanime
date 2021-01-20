"use strict";

//Formulario de Registro
var errores = document.getElementById('errores');
var username = document.getElementById('username');
var user = document.getElementById('user');
var password = document.getElementById('password');
var form = document.getElementById('form');
var register = document.getElementById('registro');

if (register) {
  register.addEventListener('click', function (e) {
    e.preventDefault();

    if (name.value == '' || password.value == '' || user.value == '') {
      errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
    } else {
      form.submit();
    }
  });
}

var login = document.getElementById('login');
var correo = document.getElementById('correo');
var pass = document.getElementById('password');
var formLogin = document.getElementById('form-login');

if (login) {
  login.addEventListener('click', function (e) {
    e.preventDefault();

    if (correo.value == '' || password.value == '') {
      errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
    } else {
      formLogin.submit();
    }
  });
} //plugin chosen