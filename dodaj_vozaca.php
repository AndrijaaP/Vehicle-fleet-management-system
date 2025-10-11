<?php
include 'config.php'; // Konekcija sa bazom
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Vozača</title>
    <link rel="stylesheet" href="dodaj_vozaca.css">
</head>
<body>
<div class="form-container">
    <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
    <h2>Unesite novog vozača</h2>

    <form action="unesi_vozaca.php" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required>

        <label for="broj_dozvole">Broj Dozvole:</label>
        <input type="text" id="broj_dozvole" name="broj_dozvole" required pattern="\d{8}" title="Broj dozvole mora imati 8 cifara">

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Aktivan">Aktivan</option>
            <option value="Neaktivan">Neaktivan</option>
        </select>

        <button type="submit">Sačuvaj vozača</button>
    </form>
</div>

</body>
</html>

