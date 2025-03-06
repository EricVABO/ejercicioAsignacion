document.addEventListener("DOMContentLoaded", () => {
    let formulario=document.getElementById("formulario")
    let nombreUsuario = document.getElementById("username");
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    let nombreError = document.getElementById("nombreError");
    let emailError = document.getElementById("emailError");
    let passwdError = document.getElementById("passwdError");
    let continuar = true;
    let validarNombre = /^[a-z]+$/;
    let validarEmail = /^[a-z]+$/;
    let validarPasswd = /^[a-z]+$/;

    formulario.addEventListener("submit",(e)=>{
        let continuar=true;
        if (!nombreUsuario.value.trim()) {
            nombreError.textContent = "Campo vacío";
            continuar = false;
        } else if (!validarNombre.test(nombreUsuario.value)) {
            nombreError.textContent = "Formato erróneo";
            nombreError.style.color="red";
            continuar = false;
        } else {
            nombreError.textContent = "";
        }
    
        if (!email.value.trim()) {
            emailError.textContent = "Campo vacío";
            continuar = false;
        } else if (!validarEmail.test(email.value)) {
            emailError.textContent = "Formato erróneo";
            emailError.style.color="red";
            continuar = false;
        } else {
            emailError.textContent = "";
        }

        if (!validarPasswd.value.trim()) {
            nombrePasswd.textContent = "Campo vacío";
            continuar = false;
        } else if (!validarPasswd.test(password.value)) {
            nombrePasswd.textContent = "Formato erróneo";
            nombrePasswd.style.color="red";
            continuar = false;
        } else {
            nombrePasswd.textContent = "";
        }

        if (!continuar) {
            e.preventDefault();
        }
    });
    });
    
