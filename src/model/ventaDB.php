<?php
require_once("src/model/conection.php");

function create_venta(DateTime $fecha, float $monto, int $persona_cedula): void
{
    $fecha = $fecha->format("Y-m-d");
    $monto = secure_data($monto);
    $persona_cedula = secure_data($persona_cedula);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO venta (fecha,monto,persona_cedula) VALUES (:fecha,:monto,:persona_cedula)");
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":monto", $monto);
    $stmt->bindParam(":persona_cedula", $persona_cedula);

    $stmt->execute();
}

function get_all_ventas(): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_venta(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_ventas_by_persona_cedula(int $persona_cedula): false | array
{
    $persona_cedula = secure_data($persona_cedula);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM venta WHERE persona_cedula=:persona_cedula");
    $stmt->bindParam(":persona_cedula", $persona_cedula);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_venta(int $id, DateTime $fecha, float $monto, int $persona_cedula): void
{
    $id = secure_data($id);
    $fecha = $fecha->format("Y-m-d");
    $monto = secure_data($monto);
    $persona_cedula = secure_data($persona_cedula);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE venta SET fecha=:fecha,monto=:monto,persona_cedula=:persona_cedula WHERE id=:id");
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":monto", $monto);
    $stmt->bindParam(":persona_cedula", $persona_cedula);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_venta(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM venta WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
