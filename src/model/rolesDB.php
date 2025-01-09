<?php
require_once("src/model/conection.php");

function create_rol(string $rol): void
{
    $rol = secure_data($rol);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO roles (rol) VALUES (:rol)");
    $stmt->bindParam(":rol", $rol);

    $stmt->execute();
}

function get_rol(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM roles WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_rol(int $id, string $rol): void
{
    $id = secure_data($id);
    $rol = secure_data($rol);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE roles SET rol=:rol WHERE id=:id");
    $stmt->bindParam(":rol", $rol);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_rol(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM roles WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
