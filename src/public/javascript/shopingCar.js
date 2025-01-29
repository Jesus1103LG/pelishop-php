document.addEventListener("DOMContentLoaded", () => {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];
  document.querySelector(".contador_producotos_carrito").textContent =
    carrito.length;
  enviarCarrito();
});

function addToCar(idProducto) {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];

  if (carrito.some((obj) => obj.idProducto === idProducto)) {
    carrito.forEach((product) => {
      if (product.idProducto == idProducto) {
        product.cant++;
      }
    });
  } else {
    carrito.push({ idProducto, cant: 1 });
  }

  document.querySelector(".contador_producotos_carrito").textContent =
    carrito.length;

  localStorage.setItem("cart", JSON.stringify(carrito));
  enviarCarrito();
}

function removeFromCar(idProducto) {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];

  carrito = carrito.filter((product) => product.idProducto !== idProducto);

  document.querySelector(".contador_producotos_carrito").textContent =
    carrito.length;

  localStorage.setItem("cart", JSON.stringify(carrito));

  enviarCarrito();
  location.reload(true);
  window.location = "http://localhost/peliShop_PHP/Cliente/carrito_compras";
}

function enviarCarrito() {
  // Obtener el carrito del localStorage
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];

  // Realizar la petición POST al servidor
  fetch("http://localhost/peliShop_PHP/Cliente/carrito_compras", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(carrito), // Convertir el carrito a JSON
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.text(); // Suponiendo que el servidor devuelve un JSON
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("Error al enviar el carrito:", error);
    });
}

function incrementarCantidad(idProducto) {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];

  carrito = carrito.map((producto) => {
    if (producto.idProducto == idProducto) {
      producto.cant++; // Aumentar la cantidad en 1
    }
    return producto;
  });

  // Guardar el carrito actualizado en localStorage
  localStorage.setItem("cart", JSON.stringify(carrito));

  // Recargar la página para reflejar los cambios
  enviarCarrito();
  location.reload(true);
  window.location = "http://localhost/peliShop_PHP/Cliente/carrito_compras";
}

function disminuirCantidad(idProducto) {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];

  carrito = carrito.map((producto) => {
    if (producto.idProducto == idProducto) {
      producto.cant--; // Aumentar la cantidad en 1
    }
    return producto;
  });

  // Guardar el carrito actualizado en localStorage
  localStorage.setItem("cart", JSON.stringify(carrito));

  // Recargar la página para reflejar los cambios
  enviarCarrito();
  location.reload(true);
  window.location = "http://localhost/peliShop_PHP/Cliente/carrito_compras";
}

function clearCart() {
  // Vaciar el carrito en localStorage
  localStorage.removeItem("cart");

  // Crear el modal dinámicamente
  const modal = document.createElement("div");
  modal.innerHTML = `
    <div class="modal-overlay">
      <div class="modal-content">
        <h2>Compra realizada con éxito</h2>
        <button onclick="closeModal()">Aceptar</button>
      </div>
    </div>
  `;
  document.body.appendChild(modal);

  // Recargar la página después de mostrar el modal
  setTimeout(() => {
    location.reload();
    enviarCarrito();
    location.reload(true);
    window.location = "http://localhost/peliShop_PHP/Cliente/shop";
  }, 2000); // Recarga en 2 segundos para que el usuario vea el mensaje
}

function closeModal() {
  document.querySelector(".modal-overlay").remove();
}

function toggleMenu() {
  document.querySelector(".navbar").classList.toggle("active");
}
