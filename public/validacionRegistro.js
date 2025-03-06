document.addEventListener("DOMContentLoaded", () => {
    let enviar=document.getElementById("enviar");
    let formulario=document.getElementById("formulario")
    let nombreUsuario = document.getElementById("username");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let nombreError = document.getElementById("nombreError");
    let emailError = document.getElementById("emailError");
    let passwdError = document.getElementById("passwdError");
    let continuar = true;
    let validarNombre = /^[a-zA-Z]+$/;
    let validarEmail = /^[\w.-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    let validarPasswd = /^(\d{8,})$/;

    enviar.addEventListener("click",(e)=>{
        e.preventDefault();
        continuar=true;

        if (!nombreUsuario.value.trim()) {
            nombreError.textContent = "Campo vacío";
            nombreError.style.color="red";
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
            emailError.style.color="red";
            continuar = false;
        } else if (!validarEmail.test(email.value)) {
            emailError.textContent = "Formato erróneo";
            emailError.style.color="red";
            continuar = false;
        } else {
            emailError.textContent = "";
        }

        if (!password.value.trim()) {
            passwdError.textContent = "Campo vacío";
            passwdError.style.color="red";
            continuar = false;
        } else if (!validarPasswd.test(password.value)) {
            passwdError.textContent = "Formato erróneo";
            passwdError.style.color="red";
            continuar = false;
        } else {
            passwdError.textContent = "";
        }

        if (continuar) {
           formulario.submit();
        }
    });
});  
