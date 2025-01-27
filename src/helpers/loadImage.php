<?php
function uploadImage($inputName)
{
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return "No se encontró el archivo o ocurrió un error al subirlo.";
    }

    // Datos del archivo
    $fileTmpPath = $_FILES[$inputName]['tmp_name'];
    $fileName = $_FILES[$inputName]['name'];
    $fileSize = $_FILES[$inputName]['size'];
    $fileType = $_FILES[$inputName]['type'];
    $fileNameCmps = pathinfo($fileName, PATHINFO_FILENAME);
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validación del tamaño del archivo
    $maxFileSize = 2 * 1024 * 1024; // 2 MB
    if ($fileSize > $maxFileSize) {
        return "El archivo supera el tamaño máximo permitido de 2MB.";
    }

    // Validación de extensiones permitidas
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        return "Tipo de archivo no permitido. Sólo se aceptan: " . implode(", ", $allowedExtensions);
    }

    // Crear un nombre único para el archivo
    $uniqueName = uniqid() . '.' . $fileExtension;

    // Definir la ruta de destino
    $targetDir = dirname(__DIR__) . "/uploads/"; // Cambia a una ruta absoluta
    $destPath = $targetDir . $uniqueName;

    // Crear carpeta si no existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Intentar mover el archivo
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        return $uniqueName; // Devuelve el nombre del archivo
    } else {
        throw new Exception("Error al mover el archivo. Verifica los permisos de la carpeta: " . $targetDir);
    }
}
