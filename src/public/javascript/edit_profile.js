function cargarCiudadesAdmin(estadoId) {
  fetch("http://localhost/peliShop_PHP/Admin/edit_profile", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ estado_id: estadoId }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la solicitud: " + response.status);
      }
      return response.text(); // Procesamos la respuesta como texto
    })
    .then((html) => {
      // Insertamos el HTML en el select de ciudades
      const ciudadSelect = document.getElementById("ciudad");
      ciudadSelect.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error al cargar las ciudades:", error);
    });
}

function cargarCiudades(estadoId) {
  fetch("http://localhost/peliShop_PHP/Cliente/edit_profile", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ estado_id: estadoId }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la solicitud: " + response.status);
      }
      return response.text(); // Procesamos la respuesta como texto
    })
    .then((html) => {
      // Insertamos el HTML en el select de ciudades
      const ciudadSelect = document.getElementById("ciudad");
      ciudadSelect.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error al cargar las ciudades:", error);
    });
}

function cargarCiudadesEmpresa(estadoId) {
  fetch("http://localhost/peliShop_PHP/Empresa/edit_profile", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ estado_id: estadoId }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la solicitud: " + response.status);
      }
      return response.text(); // Procesamos la respuesta como texto
    })
    .then((html) => {
      // Insertamos el HTML en el select de ciudades
      const ciudadSelect = document.getElementById("ciudad");
      ciudadSelect.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error al cargar las ciudades:", error);
    });
}
