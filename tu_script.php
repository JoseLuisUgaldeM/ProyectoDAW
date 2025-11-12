<?php
require "conexion.php";
// Asume que $pdo es tu conexión PDO establecida

// Define la carpeta donde se guardarán las imágenes
$directorioSubidas = "uploads/";

// Asegúrate de que la carpeta exista y tenga permisos de escritura
if (!is_dir($directorioSubidas)) {
    mkdir($directorioSubidas, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"])) {
    $nombreOriginal = $_FILES["foto"]["name"];
    $tempArchivo = $_FILES["foto"]["tmp_name"];
    $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

    // Generar un nombre único para evitar sobrescrituras y problemas de seguridad
    $nombreGuardado = uniqid() . "." . $extension;
    $rutaCompleta = $directorioSubidas . $nombreGuardado;

    // Mover el archivo de la carpeta temporal a la carpeta permanente
    if (move_uploaded_file($tempArchivo, $rutaCompleta)) {
        try {
            // Guardar solo la ruta relativa en la base de datos
            $sql = "INSERT INTO imagenes_ruta (nombre_imagen, ruta_imagen) VALUES (?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$nombreOriginal, $rutaCompleta]);

            echo "La imagen se ha subido correctamente. Ruta guardada: " . $rutaCompleta;

        } catch (PDOException $e) {
            die("Error al guardar la ruta en la DB: " . $e->getMessage());
        }
    } else {
        echo "Error al mover el archivo subido.";
    }
}
?>
