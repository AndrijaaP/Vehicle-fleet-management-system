<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voziloID = intval($_POST['vozilo_id']);

    // Pronalazi najnoviji servis za to vozilo
    $stmt = $conn->prepare("SELECT ID FROM servisi WHERE VoziloID = ? ORDER BY DatumZakazivanja DESC LIMIT 1");
    $stmt->bind_param("i", $voziloID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $servisID = $row['ID'];

        // Briše servis iz baze
        $deleteStmt = $conn->prepare("DELETE FROM servisi WHERE ID = ?");
        $deleteStmt->bind_param("i", $servisID);
        if ($deleteStmt->execute()) {
            // Ažurira status vozila na "Dostupno"
            $updateStmt = $conn->prepare("UPDATE vozila SET Status = 'Dostupno' WHERE ID = ?");
            $updateStmt->bind_param("i", $voziloID);
            $updateStmt->execute();
            $updateStmt->close();

            echo "Servis uspešno završen!";
        } else {
            echo "Greška prilikom brisanja servisa!";
        }
        $deleteStmt->close();
    } else {
        echo "Nema servisa za ovo vozilo!";
    }

    $stmt->close();
    $conn->close();
}
