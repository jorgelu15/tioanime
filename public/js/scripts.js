//Formulario de Registro

const errores = document.getElementById('errores');
const username = document.getElementById('username');
const user = document.getElementById('user');
const password = document.getElementById('password');
const form = document.getElementById('form');
const register = document.getElementById('registro');


if(register) {
    register.addEventListener('click',
    function (e) {
        e.preventDefault();

        if (name.value == '' || password.value == '' || user.value == '') {
            errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
        } else {
            form.submit();
        }
    }
);
}


const login = document.getElementById('login');
const correo = document.getElementById('correo');
const pass = document.getElementById('password');
const formLogin = document.getElementById('form-login');


if (login) {
    login.addEventListener('click',
        function (e) {
            e.preventDefault();

            if (correo.value == '' || password.value == '') {
                errores.innerHTML = '<div class="alert alert-warning" id="alert" role="alert">Todos los campos son obligatorios</div>';
            } else {
                formLogin.submit();
            }
        }
    );
}

//plugin chosen

fetch('https://api.myanimelist.net/v2/anime')