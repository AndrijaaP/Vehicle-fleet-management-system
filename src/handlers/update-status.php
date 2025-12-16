<?php
require __DIR__ . '/../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $status = trim($_POST['status']);

    $stmt = $conn->prepare("UPDATE kvarovi SET Status=? WHERE ID=?");
    $stmt->bind_param("si", $status, $id);

    if($stmt->execute()){
        $stmt->close();
        $conn->close();
        header("Location: ../admin/admin-faults.php");
        exit();
    } else {
        echo "Greška: " . $stmt->error;
    }
}
?>
