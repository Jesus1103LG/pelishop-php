<?php
require_once("src/model/conection.php");

function hash_pass($pass)
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function create_persona(array $data): void
{
    $cedula = secure_data($data["cedula"]);
    $identidad = secure_data($data["identidad"]);
    $nombre = secure_data($data["nombre"]);
    $email = secure_data($data["email"]);
    $telefono = secure_data($data["telefono"]);
    $rol = secure_data($data["rol"]);

    $password = secure_data($data["password"]);
    $password = hash_pass($password);

    $fecha_nc = new DateTime($data["fecha_nc"]);
    $fecha_nc = $fecha_nc->format("Y-m-d");

    $create_at = new DateTime();
    $create_at = $create_at->format("Y-m-d");

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO persona (cedula,identidad,nombre,email,telefono,password,create_at,roles_id,fecha_nc) VALUES (:cedula,:identidad,:nombre,:email,:telefono,:password,:create_at,:roles_id, :fecha_nc)");
    $stmt->bindParam(":cedula", $cedula);
    $stmt->bindParam(":identidad", $identidad);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":create_at", $create_at);
    $stmt->bindParam(":roles_id", $rol);
    $stmt->bindParam(":fecha_nc", $fecha_nc);

    $stmt->execute();
}

function get_persona_cedula(string $cedula): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE cedula=:cedula");
    $stmt->bindParam(":cedula", $cedula);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_persona_email(string $email): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE email=:email");
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_persona_telefono(string $telefono): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE telefono=:telefono");
    $stmt->bindParam(":telefono", $telefono);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
