<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vozilo_id'])) {
    $vozilo_id = (int)$_POST['vozilo_id'];
    $korisnik_id = $_SESSION['user_id'];

    //Provera da li je vozilo vec rezervisano
    $check_sql = "SELECT * FROM vozila WHERE ID = $vozilo_id AND Status = 'Dostupno'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        //Dodavanje rezervacije
        $conn->query("INSERT INTO rezervacije (KorisnikID, VoziloID) VALUES ($korisnik_id, $vozilo_id)");
        //Azuriranje statusa vozila
        $conn->query("UPDATE vozila SET Status = 'Rezervisano' WHERE ID = $vozilo_id");
        echo "Uspešna rezervacija!";
    } else {
        echo "Vozilo nije dostupno!";
    }
}
?>

