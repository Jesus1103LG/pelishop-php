<?php
require_once("coneccion.php");

function hash_pass($pass)
{
    return password_hash($pass, PASSWORD_DEFAULT);
}

function create_persona($data)
{
    $cedula = secure_data($data["cedula"]);
    $identidad = secure_data($data["identidad"]);
    $nombre = secure_data($data["nombre"]);
    $email = secure_data($data["email"]);
    $telefono = secure_data($data["telefono"]);
    $direccion = secure_data($data["direccion"]);
    $rol = secure_data($data["rol"]);

    $password = secure_data($data["password"]);
    $password = hash_pass($password);

    $create_at = new DateTime();
    $create_at = $create_at->format("Y-m-d");

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO persona (cedula,identidad,nombre,email,telefono,password,create_at,direccion_id,roles_id) VALUES (:cedula,:identidad,:nombre,:email,:telefono,:password,:create_at,:direccion_id,:roles_id)");
    $stmt->bindParam(":cedula", $cedula);
    $stmt->bindParam(":identidad", $identidad);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":create_at", $create_at);
    $stmt->bindParam(":direccion_id", $direccion_id);
    $stmt->bindParam(":roles_id", $roles_id);

    $stmt->execute();
}
