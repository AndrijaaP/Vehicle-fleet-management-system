<?php
require_once "config.php"; // Konekcija sa bazom

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['vozaci'])) {
        $ids = implode(",", $_POST['vozaci']);
        $query = "DELETE FROM vozaci WHERE ID IN ($ids)";
        if ($conn->query($query)) {
            echo "<script>alert('Vozači su uspešno obrisani!'); window.location.href='prikazi_vozace.php';</script>";
        } else {
            echo "Greška pri brisanju: " . $conn->error;
        }
    } else {
        echo "<script>alert('Niste izabrali nijednog vozača!'); window.location.href='prikazi_vozace.php';</script>";
    }
}
?>
