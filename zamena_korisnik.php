<?php
require 'config.php'; // Uključujemo config.php za konekciju na bazu

// Obrada forme
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prikupljanje podataka iz forme
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $brojDozvole = $_POST['broj_dozvole'];
    $tipZahteva = $_POST['tip_zahteva'];
    $opis = $_POST['opis'];

    // Čuvanje podataka u bazi koristeći mysqli
    $stmt = $conn->prepare("INSERT INTO zahtevi (Ime, Prezime, BrojDozvole, TipZahteva, Opis) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $ime, $prezime, $brojDozvole, $tipZahteva, $opis);

    if ($stmt->execute()) {
        // Poruka uspeha može se prikazati ovde ako želiš
        // echo '<p class="success">Zahtev je uspešno poslat!</p>';
    } else {
        echo '<p class="error">Došlo je do greške: ' . $stmt->error . '</p>';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zameni vozilo/opremu</title>
    <link rel="stylesheet" href="zamena_korisnik.css">
</head>
<body>
    <div class="container">
        <a href="newVersion_usertable.html" class="btn-nazad">Nazad</a>
        <h1>Zamenite vozilo ili opremu</h1>
        <form id="zamena_korisnik" action="zamena_korisnik.php" method="post">
            <!-- Ime i prezime -->
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required>

            <!-- Broj dozvole -->
            <label for="broj_dozvole">Broj dozvole:</label>
            <input type="number" id="broj_dozvole" name="broj_dozvole" required>

            <!-- Tip zahteva -->
            <label for="tip_zahteva">Tip zahteva:</label>
            <select id="tip_zahteva" name="tip_zahteva" required>
                <option value="">Izaberite tip zahteva</option>
                <option value="Zamena vozila">Zamena vozila</option>
                <option value="Zamena opreme">Zamena opreme</option>
                <option value="Ostalo">Ostalo</option>
            </select>

            <!-- Opis -->
            <label for="opis">Opis:</label>
            <textarea id="opis" name="opis" rows="5" required></textarea>

            <!-- Dugme za slanje -->
            <button type="submit">Pošalji</button>
        </form>
    </div>

    <script src="zamena_korisnik_forma.js"></script>
</body>
</html>
