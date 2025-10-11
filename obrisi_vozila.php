<?php
include 'config.php'; // Konekcija sa bazom

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vozila'])) {
    $ids = implode(',', array_map('intval', $_POST['vozila'])); // Pretvaramo niz u string ID-jeva
    $sql = "DELETE FROM Vozila WHERE ID IN ($ids)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Izabrana vozila su uspešno obrisana!'); window.location='lista_vozila.php';</script>";
    } else {
        echo "<script>alert('Greška pri brisanju vozila: " . $conn->error . "'); window.location='lista_vozila.php';</script>";
    }
} else {
    echo "<script>alert('Niste izabrali nijedno vozilo za brisanje!'); window.location='lista_vozila.php';</script>";
}

$conn->close();
?>
