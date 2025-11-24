<?php
require __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['person-name'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $brojDozvole = $_POST['dl'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO korisnici (Ime, Prezime, Email, Lozinka, TipKorisnika) VALUES (?, ?, ?, ?, 'Korisnik')");
    $stmt->bind_param("ssss", $ime, $prezime, $email, $password);

    if($stmt->execute()){
        header("Location: ../../src/user/index-user.html");
        exit;
    } else {
        echo "Greška: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
