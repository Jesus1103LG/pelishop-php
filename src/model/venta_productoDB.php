<?php
require_once("src/model/conection.php");

function create_venta_producto(int $venta_id, int $producto_id, int $cantidad): void
{
    $venta_id = secure_data($venta_id);
    $producto_id = secure_data($producto_id);
    $cantidad = secure_data($cantidad);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO venta_producto (venta_id, producto_id, cantidad) VALUES (:venta_id, :producto_id, :cantidad)");
    $stmt->bindParam(":venta_id", $venta_id);
    $stmt->bindParam(":producto_id", $producto_id);
    $stmt->bindParam(":cantidad", $cantidad);

    $stmt->execute();
}

function get_all_ventas_productos(): array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta_producto");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_venta_producto_by_venta(int $venta_id): false | array
{
    $venta_id = secure_data($venta_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta_producto WHERE venta_id=:venta_id");
    $stmt->bindParam(":venta_id", $venta_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_venta_producto_by_producto(int $producto_id): false | array
{
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta_producto WHERE producto_id=:producto_id");
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_venta_producto(int $venta_id, int $producto_id, int $cantidad): void
{
    $venta_id = secure_data($venta_id);
    $producto_id = secure_data($producto_id);
    $cantidad = secure_data($cantidad);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE venta_producto SET cantidad=:cantidad WHERE venta_id=:venta_id AND producto_id=:producto_id");
    $stmt->bindParam(":cantidad", $cantidad);
    $stmt->bindParam(":venta_id", $venta_id);
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
}

function delete_venta_producto(int $venta_id, int $producto_id): void
{
    $venta_id = secure_data($venta_id);
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM venta_producto WHERE venta_id=:venta_id AND producto_id=:producto_id");
    $stmt->bindParam(":venta_id", $venta_id);
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
}
