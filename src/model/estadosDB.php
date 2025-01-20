<?php
require_once("src/model/conection.php");

function create_estado(string $estado): void
{
    $estado = secure_data($estado);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO estados (estado) VALUE (:estado)");
    $stmt->bindParam(":estado", $estado);

    $stmt->execute();
}

function get_estado(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM estados WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_all_estados(): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM estados");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function update_estados(int $id, string $estado): void
{
    $id = secure_data($id);
    $estado = secure_data($estado);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE estados SET estado=:estado WHERE id=:id");
    $stmt->bindParam(":estado", $estado);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_estados(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM estados WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
