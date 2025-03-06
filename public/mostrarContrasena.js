document.addEventListener("DOMContentLoaded", (e) => {
    let mostrada = false;
    let mostrarContrasena = document.getElementById("mostrarContrasena");
    mostrarContrasena.addEventListener("click", (e) => {
      if (!mostrada) {
        let password = document.getElementById("password");
        password.setAttribute("type", "text");
        mostrada = true;
        mostrarContrasena.classList.remove("bx-show-alt");
        mostrarContrasena.classList.add("bx-hide");
      } else {
        password.setAttribute("type", "password");
        mostrada = false;
        mostrarContrasena.classList.remove("bx-hide");
        mostrarContrasena.classList.add("bx-show-alt");
      }
    });
  
    
  });