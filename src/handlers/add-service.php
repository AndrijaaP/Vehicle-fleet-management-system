<?php
require __DIR__ . '/../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voziloID = intval($_POST['voziloID']);
    $datumZakazivanja = $_POST['datumZakazivanja'];
    $datumIzvrsenja = $_POST['datumIzvrsenja'];
    $opis = trim($_POST['opis']);

    $stmt = $conn->prepare("INSERT INTO servisi (VoziloID, DatumZakazivanja, DatumIzvrsenja, OpisPopravke) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $voziloID, $datumZakazivanja, $datumIzvrsenja, $opis);

    if ($stmt->execute()) {
        $update = $conn->prepare("UPDATE vozila SET Status = 'Na popravci' WHERE ID = ?");
        $update->bind_param("i", $voziloID);
        $update->execute();
        $update->close();

        echo "Servis uspešno zakazan!";
    } else {
        echo "Greška: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
