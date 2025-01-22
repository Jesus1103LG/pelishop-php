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
    $cedula = secure_data($cedula);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE cedula=:cedula");
    $stmt->bindParam(":cedula", $cedula);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_persona_email(string $email): false | array
{
    $email = secure_data($email);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE email=:email");
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_persona_telefono(string $telefono): false | array
{
    $telefono = secure_data($telefono);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE telefono=:telefono");
    $stmt->bindParam(":telefono", $telefono);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_persona_rol(int $rol): false | array
{
    $rol = secure_data($rol);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE roles_id=:rol");
    $stmt->bindParam(":rol", $rol);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_all_persona(): false | array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function update_persona(array $data): void
{
    $cedula = secure_data($data["cedula"]);
    $identidad = secure_data($data["identidad"]);
    $nombre = secure_data($data["nombre"]);
    $email = secure_data($data["email"]);
    $telefono = secure_data($data["telefono"]);
    $rol = secure_data($data["rol"]);

    $fecha_nc = new DateTime($data["fecha_nc"]);
    $fecha_nc = $fecha_nc->format("Y-m-d");

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE persona SET identidad=:identidad, nombre=:nombre, email=:email, telefono=:telefono, roles_id=:roles_id, fecha_nc=:fecha_nc WHERE cedula=:cedula");
    $stmt->bindParam(":cedula", $cedula);
    $stmt->bindParam(":identidad", $identidad);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":roles_id", $rol);
    $stmt->bindParam(":fecha_nc", $fecha_nc);

    $stmt->execute();
}

function delete_persona(string $cedula): void
{
    $cedula = secure_data($cedula);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM persona WHERE cedula=:cedula");
    $stmt->bindParam(":cedula", $cedula);

    $stmt->execute();
}

function check_email(string $email): bool
{
    $email = secure_data($email);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE email=:email");
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($result["email"])) {
        return true;
    } else {
        return false;
    }
}

function get_pass_by_email(string $email): string
{
    $email = secure_data($email);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM persona WHERE email=:email");
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result["password"];
}

function auth_user(string $email, string $password): bool
{
    $email = secure_data($email);
    $password = secure_data($password);

    if (check_email($email)) {
        $passInDB = get_pass_by_email($email);
        $resultAuth = password_verify($password, $passInDB);
        return $resultAuth;
    }
    return false;
}
