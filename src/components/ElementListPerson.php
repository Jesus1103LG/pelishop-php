<?php if ($cant_clientes > 0 || $cant_empresas > 0): ?>
    <li class="customer-item">
        <div class="customer-details">
            <div class="customer-img">
                <img src="../src/uploads/<?= $persona["foto_perfil"] ?>" alt="<?= $persona["nombre"] ?> foto perfil." />
            </div>
            <div class="customer-info">
                <p class="customer-name"><?= $persona["nombre"] ?></p>
                <p class="customer-email"><?= $persona["email"] ?></p>
            </div>
            <div class="customer-amount"><?= $persona["identidad"] . $persona["cedula"] ?></div>
        </div>
    </li>
<?php else: ?>
    <li>No hay ningun persona registrada.</li>
<?php endif; ?>