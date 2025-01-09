<?php
require_once("src/model/conection.php");

function create_categoria(string $categoria, string $descipcion): void
{
    $categoria = secure_data($categoria);
    $descipcion = secure_data($descipcion);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO categorias (categoria,descripcion) VALUES (:categoria,:descripcion)");
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":descripcion", $descipcion);

    $stmt->execute();
}

function get_categoria(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM categorias WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_categoria(int $id, string $categoria, string $descipcion): void
{
    $id = secure_data($id);
    $categoria = secure_data($categoria);
    $descipcion = secure_data($descipcion);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE categorias SET categoria=:categoria,descripcion=:descripcion WHERE id=:id");
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":descripcion", $descipcion);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_categoria(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM categorias WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
