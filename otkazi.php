<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rezervacija_id'])) {
    $rezervacija_id = $_POST['rezervacija_id'];
    
    // Pribavljanje ID vozila iz rezervacije
    $sql = "SELECT VoziloID FROM rezervacije WHERE ID = $rezervacija_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $vozilo_id = $row['VoziloID'];

    // Brisanje rezervacije
    $delete_sql = "DELETE FROM rezervacije WHERE ID = $rezervacija_id";
    $conn->query($delete_sql);

    // Ažuriranje statusa vozila na "Dostupno"
    $update_sql = "UPDATE vozila SET Status = 'Dostupno' WHERE ID = $vozilo_id";
    $conn->query($update_sql);

    echo "<script>alert('Rezervacija otkazana!'); window.location='moje_rezervacije.php';</script>";
}
?>
