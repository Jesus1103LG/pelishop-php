<?php
include("constants.php");

function coneccionDB()
{
    $hostDB = "mysql:host=" . HOST_NAME . ";dbname=" . NAME_DB . ";";

    try {
        $coneccion = new PDO($hostDB, USERNAME_DB, PASSWORD_DB);
        $coneccion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $coneccion;
    } catch (PDOException $e) {
        die("ERROR: " . $e->getMessage());
    }
}
