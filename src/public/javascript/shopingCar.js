document.addEventListener("DOMContentLoaded", () => {
  let carrito = JSON.parse(localStorage.getItem("cart")) || [];
  document.querySelector(".contador_producotos_carrito").textContent =
    carrito.length;
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
}
