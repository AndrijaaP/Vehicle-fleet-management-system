<?php
require __DIR__ . '/../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $broj_dozvole = trim($_POST['broj_dozvole']);
    $status = $_POST['status'];

    // Validacija
    if (empty($id) || empty($ime) || empty($prezime) || empty($broj_dozvole)) {
        echo "<script>alert('Sva polja su obavezna!'); window.location='../admin/admin-add-driver.php';</script>";
        exit();
    }

    if (!preg_match('/^\d{8}$/', $broj_dozvole)) {
        echo "<script>alert('Broj dozvole mora sadržati tačno 8 cifara!'); window.location='../admin/admin-add-driver.php';</script>";
        exit();
    }

    // Provera da li ID već postoji
    $check = $conn->query("SELECT ID FROM Vozaci WHERE ID = $id");
    if ($check->num_rows > 0) {
        echo "<script>alert('Vozač sa ovim ID-jem već postoji!'); window.location='../admin/admin-add-driver.php';</script>";
    } else {
        $sql = "INSERT INTO Vozaci (ID, Ime, Prezime, BrojDozvole, Status) VALUES ('$id', '$ime', '$prezime', '$broj_dozvole', '$status')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Vozač uspešno dodat!'); window.location='../admin/admin-add-driver.php';</script>";
        } else {
            echo "<script>alert('Greška pri unosu!'); window.location='../admin/admin-add-driver.php';</script>";
        }
    }
}
$conn->close();
?>
