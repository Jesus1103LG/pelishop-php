<?php
require_once("src/model/conection.php");

function create_ciudad(string $ciudad, int $estados_id): void
{
    $ciudad = secure_data($ciudad);
    $estados_id = secure_data($estados_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO ciudades (ciudad,estados_id) VALUES (:ciudad,:estados_id)");
    $stmt->bindParam(":ciudad", $ciudad);
    $stmt->bindParam(":estados_id", $estados_id);

    $stmt->execute();
}

function get_ciudad(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM ciudades WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_ciudades_by_estado(int $estados_id): false | array
{
    $estados_id = secure_data($estados_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM ciudades WHERE estados_id=:estados_id");
    $stmt->bindParam(":estados_id", $estados_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_ciudad(int $id, string $ciudad, int $estados_id): void
{
    $id = secure_data($id);
    $ciudad = secure_data($ciudad);
    $estados_id = secure_data($estados_id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE ciudades SET ciudad=:ciudad,estados_id=:estados_id WHERE id=:id");
    $stmt->bindParam(":ciudad", $ciudad);
    $stmt->bindParam(":estados_id", $estados_id);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_ciudad(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM ciudades WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
