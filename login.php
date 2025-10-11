<?php
session_start();
header('Content-Type: application/json');
require 'config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$form_type = $_POST['form_type'] ?? '';

if (empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Unesite email i lozinku!"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM korisnici WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if ($password === $user['Lozinka']) {
        
        // Provera tipa korisnika
        if (strcasecmp($user['TipKorisnika'], $form_type) !== 0) {
            echo json_encode(["status" => "error", "message" => "Nepoznat tip korisnika!"]);
            exit;
        }

        $_SESSION['user_id'] = $user['ID'];

        if ($user['TipKorisnika'] === 'Korisnik') {
            echo json_encode(["status" => "success", "redirect" => "../newVersion_usertable.html"]);
        } elseif ($user['TipKorisnika'] === 'Admin') {
            echo json_encode(["status" => "success", "redirect" => "../newVersion_admintable.html"]);
        }

    } else {
        echo json_encode(["status" => "error", "message" => "Pogrešna lozinka!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Korisnik ne postoji!"]);
}
?>
