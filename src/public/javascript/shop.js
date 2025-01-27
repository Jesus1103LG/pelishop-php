const productList = document.querySelector(".products");
const products = JSON.parse(localStorage.getItem("products"));
let search = document.querySelector(".buscador-input");
let filter_color = document.getElementById("filtro-color");
let filtro_ciudad = document.getElementById("filtro-ciudad");

let productoss = JSON.parse(localStorage.getItem("cart"));

// Carga todos las tarjetas de los productos

document.addEventListener("DOMContentLoaded", () => {
  showAllProducts();
});

// funcionamiento de la barra de busqueda

search.addEventListener("change", (e) => {
  productList.innerHTML = "";
  products.forEach((product) => {
    let title = product.titulo.toLowerCase();

    if (title.includes(e.target.value)) {
      let div = document.createElement("div");
      div.classList.add("product-card");
      div.innerHTML = `
            <img src="public/logo.png" alt="${product.titulo}" />
              <div class="product-card-info">
                <h3>${product.titulo}</h3>
                <h4>${product.color}</h4>
                <h5>${product.precio}$</h5>
                <p>${product.ubicacion}</p>
              </div>
            `;
      productList.appendChild(div);

      div.addEventListener("click", () => {
        let producto = {
          titulo: product.titulo,
          color: product.color,
          precio: product.precio,
          ubicacion: product.ubicacion,
          imagen: product.imagen,
        };
        localStorage.setItem("product", JSON.stringify(producto));
        window.location.href = "/productDetail.html";
      });
    }
  });
});

// funcionamiento del filtro por colores

filter_color.addEventListener("change", (e) => {
  productList.innerHTML = "";
  let colors = e.target.value.toLowerCase();
  products.forEach((product) => {
    let color = product.color.toLowerCase();
    if (color === colors) {
      let div = document.createElement("div");
      div.classList.add("product-card");
      div.innerHTML = `
              <img src="public/logo.png" alt="${product.titulo}" />
                <div class="product-card-info">
                  <h3>${product.titulo}</h3>
                  <h4>${product.color}</h4>
                  <h5>${product.precio}$</h5>
                  <p>${product.ubicacion}</p>

                </div>
              `;
      productList.appendChild(div);

      div.addEventListener("click", () => {
        let producto = {
          titulo: product.titulo,
          color: product.color,
          precio: product.precio,
          ubicacion: product.ubicacion,
          imagen: product.imagen,
        };
        localStorage.setItem("product", JSON.stringify(producto));
        window.location.href = "/productDetail.html";
      });
    } else if (colors === "selecciona el color") {
      showAllProducts();
    }
  });
});

// Funcionamiento del filtro por ciudad

filtro_ciudad.addEventListener("change", (e) => {
  productList.innerHTML = "";
  products.forEach((product) => {
    let city = product.ubicacion.toLowerCase();

    if (city.includes(e.target.value)) {
      let div = document.createElement("div");
      div.classList.add("product-card");
      div.innerHTML = `
              <img src="public/logo.png" alt="${product.titulo}" />
                <div class="product-card-info">
                  <h3>${product.titulo}</h3>
                  <h4>${product.color}</h4>
                  <h5>${product.precio}$</h5>
                  <p>${product.ubicacion}</p>
                </div>
              `;
      productList.appendChild(div);

      div.addEventListener("click", () => {
        let producto = {
          titulo: product.titulo,
          color: product.color,
          precio: product.precio,
          ubicacion: product.ubicacion,
          imagen: product.imagen,
        };
        localStorage.setItem("product", JSON.stringify(producto));
        window.location.href = "/productDetail.html";
      });
    }
  });
});

// Funcion para cambiar de moneda

let checkbox1 = document.getElementById("checkbox1");
let checkbox2 = document.getElementById("checkbox2");

document.addEventListener("DOMContentLoaded", () => {
  checkbox1.checked = false;
  checkbox2.checked = true;

  showAllProducts();
});

function toggleCheckbox(selectedId, otherId) {
  const selectedCheckbox = document.getElementById(selectedId);
  const otherCheckbox = document.getElementById(otherId);

  if (selectedCheckbox.checked) {
    otherCheckbox.checked = false;
  } else {
    otherCheckbox.checked = true;
  }
}

checkbox1.addEventListener("click", () => {
  toggleCheckbox("checkbox1", "checkbox2");
  productList.innerHTML = "";
  products.forEach((product) => {
    if (checkbox1.checked) {
      let div = document.createElement("div");
      div.classList.add("product-card");
      div.innerHTML = `
              <img src="public/logo.png" alt="${product.titulo}" />
                <div class="product-card-info">
                  <h3>${product.titulo}</h3>
                  <h4>${product.color}</h4>
                  <h5>${product.precio * 37}Bs.</h5>
                  <p>${product.ubicacion}</p>
                </div>
              `;
      productList.appendChild(div);

      div.addEventListener("click", () => {
        let producto = {
          titulo: product.titulo,
          color: product.color,
          precio: product.precio * 37,
          ubicacion: product.ubicacion,
          imagen: product.imagen,
        };
        localStorage.setItem("product", JSON.stringify(producto));
        window.location.href = "/productDetail.html";
      });
    }
  });
});

checkbox2.addEventListener("click", () => {
  toggleCheckbox("checkbox2", "checkbox1");

  productList.innerHTML = "";
  products.forEach((product) => {
    if (checkbox2.checked) {
      let div = document.createElement("div");
      div.classList.add("product-card");
      div.innerHTML = `
              <img src="public/logo.png" alt="${product.titulo}" />
                <div class="product-card-info">
                  <h3>${product.titulo}</h3>
                  <h4>${product.color}</h4>
                  <h5>${product.precio}$</h5>
                  <p>${product.ubicacion}</p>
                </div>
              `;
      productList.appendChild(div);

      div.addEventListener("click", () => {
        let producto = {
          titulo: product.titulo,
          color: product.color,
          precio: product.precio,
          ubicacion: product.ubicacion,
          imagen: product.imagen,
        };
        localStorage.setItem("product", JSON.stringify(producto));
        window.location.href = "/productDetail.html";
      });
    }
  });
});

// Funcion para mostrar todos los elementos(tarjetas de productos)

function showAllProducts() {
  products.forEach((product) => {
    let div = document.createElement("div");
    div.classList.add("product-card");
    div.innerHTML = `
                  <img src="public/logo.png" alt="${product.titulo}" />
                    <div class="product-card-info">
                      <h3>${product.titulo}</h3>
                      <h4>${product.color}</h4>
                      <h5>${product.precio}$</h5>
                      <p>${product.ubicacion}</p>
                    </div>
                  `;
    productList.appendChild(div);

    div.addEventListener("click", () => {
      let producto = {
        titulo: product.titulo,
        color: product.color,
        precio: product.precio,
        ubicacion: product.ubicacion,
        imagen: product.imagen,
      };
      localStorage.setItem("product", JSON.stringify(producto));
      window.location.href = "/productDetail.html";
    });
  });
}

function showAllProductsBs(product) {
  products.forEach((product) => {
    let div = document.createElement("div");
    div.classList.add("product-card");
    div.innerHTML = `
                  <img src="public/logo.png" alt="${product.titulo}" />
                    <div class="product-card-info">
                      <h3>${product.titulo}</h3>
                      <h4>${product.color}</h4>
                      <h5>${product.precio * 37}$</h5>
                    </div>
                  `;
    productList.appendChild(div);

    div.addEventListener("click", () => {
      let producto = {
        titulo: product.titulo,
        color: product.color,
        precio: product.precio * 37,
        ubicacion: product.ubicacion,
        imagen: product.imagen,
      };
      localStorage.setItem("product", JSON.stringify(producto));
      window.location.href = "/productDetail.html";
    });
  });
}

let carritoIcono = document.querySelector(".circulo");

carritoIcono.textContent = productoss.length;
