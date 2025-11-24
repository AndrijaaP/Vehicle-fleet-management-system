<?php
$host = "localhost";  
$user = "root";       
$password = "";       
$dbname = "vozniparkdb"; 

// Kreiranje konekcije
$conn = new mysqli($host, $user, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška pri povezivanju: " . $conn->connect_error);
}

// Podesi da se koriste UTF-8 karakteri
$conn->set_charset("utf8");

?>
