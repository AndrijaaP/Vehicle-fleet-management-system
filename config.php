<?php
$host = "localhost";  // Ili IP adresa servera ako nije lokalno
$user = "root";       // Korisničko ime MySQL-a (podrazumevano je 'root' za XAMPP)
$password = "";       // Šifra (prazno ako nisi menjao u XAMPP-u)
$dbname = "VozniParkDB"; // Naziv tvoje baze podataka

// Kreiranje konekcije
$conn = new mysqli($host, $user, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška pri povezivanju: " . $conn->connect_error);
}

// Podesi da se koriste UTF-8 karakteri
$conn->set_charset("utf8");

?>
