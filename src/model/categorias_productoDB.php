<?php
require_once("src/model/conection.php");

function create_categorias_producto(int $categoria_id, int $producto_id): void
{
    $categoria_id = secure_data($categoria_id);
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO categorias_producto (categoria_id, producto_id) VALUES (:categoria_id, :producto_id)");
    $stmt->bindParam(":categoria_id", $categoria_id);
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
}

function get_all_categorias_producto(): array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM categorias_producto");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_categorias_producto_by_producto(int $producto_id): false | array
{
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM categorias_producto WHERE producto_id=:producto_id");
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_categorias_producto_by_categoria(int $categoria_id): false | array
{
    $categoria_id = secure_data($categoria_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM categorias_producto WHERE categoria_id=:categoria_id");
    $stmt->bindParam(":categoria_id", $categoria_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_categorias_producto(int $categoria_id, int $producto_id): void
{
    $categoria_id = secure_data($categoria_id);
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE categorias_producto SET categoria_id=:categoria_id, producto_id=:producto_id WHERE categoria_id=:categoria_id AND producto_id=:producto_id");
    $stmt->bindParam(":categoria_id", $categoria_id);
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
}

function delete_categorias_producto(int $categoria_id, int $producto_id): void
{
    $categoria_id = secure_data($categoria_id);
    $producto_id = secure_data($producto_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM categorias_producto WHERE categoria_id=:categoria_id AND producto_id=:producto_id");
    $stmt->bindParam(":categoria_id", $categoria_id);
    $stmt->bindParam(":producto_id", $producto_id);

    $stmt->execute();
}
