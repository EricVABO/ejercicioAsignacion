document.addEventListener("DOMContentLoaded", (e) => {
  let verTareas = document.getElementById("verTareas");
  verTareas.addEventListener("click", (e) => {
    if (id) {
      fetch(`../control/api/tareas_api.php?id=${id}`, {
        method: "GET",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
      })
        .then((response) => response.json())
        .then((data) => {
          let tareas = data;
          let divTareas = document.getElementById("tareas");
          divTareas.innerText = "";
          if (tareas.length === 0) {
            divTareas.innerHTML = "<p>NO HAY TAREAS</p>";
          } else {
            divTareas.innerHTML = "";
            tareas.forEach((tarea) => {
              divTareas.innerHTML +=
                '<div class="tarea" data-id="' +
                tarea.id +
                '">' +
                "<p>" +
                tarea.descripcion_tarea +
                "</p>" +
                '<button class="borrar">Borrar</button>' +
                "</div>";
            });
          }
        })
        .catch((error) => {
          console.log("Error en la solicitud:", error);
        });
    } else {
      console.log("No se ha encontrado un usuario ID o no está logueado");
    }
  });

  document.getElementById("tareas").addEventListener("click", function (e) {
    let id = e.target.parentElement.dataset.id;
    if (id) {
      fetch(`../control/api/tareas_api.php`, {
        method: "DELETE",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: JSON.stringify({ id: id }),
      })
        .then((response) => response.json())
        .then((data) => {
          let tareas = document.getElementById("tareas");
          tareas.innerHTML = "";
          verTareas.click();
        })
        .catch((error) => {
          console.log("Error en la solicitud:", error);
        });
    }
  });

  let insertar = document.getElementById("insertarTarea");
  insertar.addEventListener("click", (e) => {
    let insertarTareaContainer = document.getElementById(
      "insertarTareaContainer"
    );
    if (!insertarTareaContainer) {
      insertarTareaContainer = document.createElement("div");
      insertarTareaContainer.id = "insertarTareaContainer";
      insertarTareaContainer.classList.add("insertor");

      insertarTareaContainer.innerHTML = `
      <textarea id="descripcionTarea" placeholder="Descripción de la tarea"></textarea>
      <button id="agregarTarea">Agregar tarea</button>
      <button id="cancelar">Cancelar</button>`;

      document.body.appendChild(insertarTareaContainer);

      let cancelar = document.getElementById("cancelar");
      cancelar.addEventListener("click", (e) => {
        insertarTareaContainer.remove();
      });

      let agregarTarea = document.getElementById("agregarTarea");
      agregarTarea.addEventListener("click", (e) => {
        let descripcion_tarea = document.getElementById("descripcionTarea").value.trim();
        fetch("../control/api/tareas_api.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ descripcion_tarea: descripcion_tarea }),
        })
          .then((response) => response.json())
          .then((data) => {
            let tareas = document.getElementById("tareas");
            tareas.innerHTML = "";
            let verTareas = document.getElementById("verTareas");
            verTareas.click();
          })
          .catch((error) => {
            console.log("Error en la solicitud:", error);
          });
      });
    } else {
      insertarTareaContainer.innerHTML = "";
      insertar.click();
    }
  });
});
