<?php
include_once __DIR__.'/database.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $query = "SELECT COUNT(*) as count FROM productos WHERE nombre = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data['count'] > 0){
        echo json_encode(['exists' => true]);
    }
} else {
    echo json_encode(['exists' => false]);
}
?>