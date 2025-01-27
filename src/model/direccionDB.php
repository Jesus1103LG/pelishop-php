<?php
require_once("src/model/conection.php");

function create_direccion(string $calle, int $estado_id, int $ciudad_id): int
{
    $calle = secure_data($calle);
    $estado_id = secure_data($estado_id);
    $ciudad_id = secure_data($ciudad_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO direccion (calle, estado_id, ciudad_id) VALUES (:calle, :estado_id, :ciudad_id)");
    $stmt->bindParam(":calle", $calle);
    $stmt->bindParam(":estado_id", $estado_id);
    $stmt->bindParam(":ciudad_id", $ciudad_id);

    $stmt->execute();

    return $coneccion->lastInsertId();
}

function get_direccion(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM direccion WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_all_direcciones(): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM direccion");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function update_direccion(int $id, string $calle, int $estado_id, int $ciudad_id): void
{
    $id = secure_data($id);
    $calle = secure_data($calle);
    $estado_id = secure_data($estado_id);
    $ciudad_id = secure_data($ciudad_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE direccion SET calle=:calle,estados_id=:estados_id, ciudad_id=:ciudad_id WHERE id=:id");
    $stmt->bindParam(":calle", $calle);
    $stmt->bindParam(":ciudad_id", $ciudad_id);
    $stmt->bindParam(":estados_id", $estados_id);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_direccion(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM direccion WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
