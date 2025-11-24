<?php
require __DIR__ . '/../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['tip'])) {
        $id = $_POST['id'];
        $tip = $_POST['tip'];
        
        if ($tip == "vozilo") {
            $marka = $_POST['marka'];
            $model = $_POST['model'];
            $godiste = $_POST['godiste'];
            $registracija = $_POST['registracija'];
            $status = $_POST['status'];

            $query = $conn->prepare("UPDATE vozila SET Marka=?, Model=?, Godiste=?, Registracija=?, Status=? WHERE ID=?");
            $query->bind_param("ssissi", $marka, $model, $godiste, $registracija, $status, $id);

        } elseif ($tip == "vozac") {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $broj_dozvole = $_POST['broj_dozvole'];
            $status = $_POST['status'];

            $query = $conn->prepare("UPDATE vozaci SET Ime=?, Prezime=?, BrojDozvole=?,Status=? WHERE ID=?");
            $query->bind_param("ssssi", $ime, $prezime, $broj_dozvole,$status, $id);

        } elseif ($tip == "servis") {
            $datum_zakazivanja = $_POST['datum_zakazivanja'];
            $datum_izvrsenja = $_POST['datum_izvrsenja'];
            $opis_popravke = $_POST['opis_popravke'];
            $status = $_POST['status'];

            $query = $conn->prepare("UPDATE servisi SET DatumZakazivanja=?, DatumIzvrsenja=?, OpisPopravke=?, Status=? WHERE ID=?");
            $query->bind_param("ssssi", $datum_zakazivanja, $datum_izvrsenja, $opis_popravke, $status, $id);
        }

        if ($query->execute()) {
            header("Location: ../admin/admin-edit.php?id=$id&tip=$tip&success=" . urlencode("Izmene su uspešno sačuvane!"));
        } else {
            header("Location: ../admin/admin-edit.php?id=$id&tip=$tip&error=" . urlencode("Došlo je do greške pri ažuriranju!"));
        }
        exit();
    }
}
?>
