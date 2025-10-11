<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voziloID = isset($_POST['vozilo_id']) ? intval($_POST['vozilo_id']) : 0;
    $korisnikID = isset($_POST['korisnik_id']) ? intval($_POST['korisnik_id']) : 0;
    $opis = isset($_POST['opis']) ? trim($_POST['opis']) : '';

    $errors = [];
    $db = new mysqli("localhost", "root", "", "vozniparkdb");

    if ($db->connect_error) {
        die("Greška u povezivanju sa bazom: " . $db->connect_error);
    }

    // Provera vozila
    $stmt = $db->prepare("SELECT COUNT(*) FROM vozila WHERE ID = ?");
    $stmt->bind_param("i", $voziloID);
    $stmt->execute();
    $stmt->bind_result($vozilo_count);
    $stmt->fetch();
    $stmt->close();

    if ($vozilo_count == 0) {
        echo "ID vozila ne postoji u sistemu.";
        exit();
    }

    // Provera korisnika
    $stmt = $db->prepare("SELECT COUNT(*) FROM korisnici WHERE ID = ?");
    $stmt->bind_param("i", $korisnikID);
    $stmt->execute();
    $stmt->bind_result($korisnik_count);
    $stmt->fetch();
    $stmt->close();

    if ($korisnik_count == 0) {
        echo "ID korisnika ne postoji u sistemu.";
        exit();
    }

    // Ubacivanje u bazu
    $stmt = $db->prepare("INSERT INTO kvarovi (VoziloID, KorisnikID, Opis) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $voziloID, $korisnikID, $opis);

    if ($stmt->execute()) {
        echo "Kvar uspešno prijavljen!";
    } else {
        echo "Došlo je do greške: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
    exit();
}
?>

