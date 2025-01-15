<?php if ($cant_ventas > 0): ?>
    <?php
    $person = get_persona_cedula($venta["persona_cedula"]);
    ?>
    <li class="customer-item">
        <div class="customer-details">
            <div class="customer-img">
                <img src="../src/uploads/<?= $person["foto_perfil"] ?>" alt="<?= $person["nombre"] ?> foto perfil." />
            </div>
            <div class="customer-info">
                <p class="customer-name"><?= $person["nombre"] ?></p>
                <p class="customer-email"><?= $person["email"] ?></p>
            </div>
            <div class="customer-amount"><?= $venta["monto"] ?></div>
        </div>
    </li>
<?php else: ?>
    <li style="color:#4a5568; font-weight: 400;">No hay ninguna venta registrada.</li>
<?php endif; ?>