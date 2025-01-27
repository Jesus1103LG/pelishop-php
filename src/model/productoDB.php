<?php
require_once("src/model/conection.php");

function create_producto(array $data): void
{
    $nombre = secure_data($data["nombre"]);
    $precio = secure_data($data["precio"]);
    $stock = secure_data($data["stock"]);
    $talla = secure_data($data["talla"]);
    $color = secure_data($data["color"]);
    $persona_cedula = secure_data($data["persona_cedula"]);
    $foto_pruducto = secure_data($data["foto_producto"]);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("INSERT INTO producto (nombre,precio,stock,talla,color,persona_cedula,foto_producto) VALUES (:nombre,:precio,:stock,:talla,:color,:persona_cedula, :foto_producto)");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":stock", $stock);
    $stmt->bindParam(":talla", $talla);
    $stmt->bindParam(":color", $color);
    $stmt->bindParam(":persona_cedula", $persona_cedula);
    $stmt->bindParam(":foto_producto", $foto_producto);

    $stmt->execute();
}

function get_all_productos(): array
{
    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM producto");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_producto(int $id): false | array
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM producto WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_productos_by_talla(string $talla): false | array
{
    $talla = secure_data($talla);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM producto WHERE talla=:talla");
    $stmt->bindParam(":talla", $talla);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_productos_by_color(string $color): false | array
{
    $color = secure_data($color);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("SELECT * FROM producto WHERE color=:color");
    $stmt->bindParam(":color", $color);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function update_producto(int $id, array $data): void
{
    $id = secure_data($id);
    $nombre = secure_data($data["nombre"]);
    $precio = secure_data($data["precio"]);
    $stock = secure_data($data["stock"]);
    $talla = secure_data($data["talla"]);
    $color = secure_data($data["color"]);
    $persona_cedula = secure_data($data["persona_cedula"]);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("UPDATE producto SET nombre=:nombre,precio=:precio,stock=:stock,talla=:talla,color=:color,persona_cedula=:persona_cedula WHERE id=:id");
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":stock", $stock);
    $stmt->bindParam(":talla", $talla);
    $stmt->bindParam(":color", $color);
    $stmt->bindParam(":persona_cedula", $persona_cedula);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}

function delete_producto(int $id): void
{
    $id = secure_data($id);

    $coneccion = coneccionDB();

    $stmt = $coneccion->prepare("DELETE FROM producto WHERE id=:id");
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
