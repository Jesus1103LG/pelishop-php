<div class="product-card">
    <a href="/peliShop_PHP/Cliente/producto_detail/<?= $producto["id"] ?>">
        <img class="product-image" src="/peliShop_PHP/src/uploads/<?= $producto["foto_producto"] ?>" alt="product image" />
    </a>
    <div class="product-details">
        <a href="/peliShop_PHP/Cliente/producto_detail/<?= $producto["id"] ?>">
            <h5 class="product-title"><?= $producto["nombre"] ?></h5>
            <h6 class="distribuidor-email"><b>Vendedor:</b> <?= get_persona_cedula($producto["persona_cedula"])["email"] ?></h6>
        </a>
        <div class="product-rating">
            <div class="stars">
                <svg class="star-icon yellow" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                </svg>
                <!-- Repeated SVG for stars -->
            </div>
            <span class="rating-label">5.0</span>
        </div>
        <div class="product-pricing">
            <span class="price">Bs<?= $producto["precio"] ?></span>
            <button href="#" class="add-to-cart-button" onclick="addToCar(this.value)" value="<?= $producto["id"] ?>">Add to cart</button>
        </div>
    </div>
</div>