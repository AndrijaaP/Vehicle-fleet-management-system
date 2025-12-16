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

// UTF-8 karekteri
$conn->set_charset("utf8");

?>
