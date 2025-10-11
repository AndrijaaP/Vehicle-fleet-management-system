<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE kvarovi SET Status='$status' WHERE ID='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Status uspešno ažuriran!";
    } else {
        echo "Greška: " . $conn->error;
    }

    $conn->close();
    header("Location: admin_kvarovi.php");
    exit();
}
?>
