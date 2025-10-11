<?php
require_once "config.php";

$query = "SELECT * FROM servisi";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled Servisa</title>
    <link rel="stylesheet" href="pregled_podataka_admin.css">
    <script src="pregled_podataka_admin.js" defer></script>
</head>
<body>

<div class="container">
    <h2>Pregled svih servisa</h2>
    <input type="text" id="pretragaServisa" class="search-box" onkeyup="pretraziTabelu('pretragaServisa', 'tabelaServisa')" placeholder="Pretraži servise...">
    <table id="tabelaServisa">
        <tr>
            <th onclick="sortirajTabelu('tabelaServisa', 0)">ID</th>
            <th onclick="sortirajTabelu('tabelaServisa', 1)">Vozilo ID</th>
            <th onclick="sortirajTabelu('tabelaServisa', 2)">Datum Zakazivanja</th>
            <th onclick="sortirajTabelu('tabelaServisa', 3)">Datum Izvršenja</th>
            <th onclick="sortirajTabelu('tabelaServisa', 4)">Opis Popravke</th>
            <th onclick="sortirajTabelu('tabelaServisa', 4)">Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['ID'] ?></td>
                <td><?= $row['VoziloID'] ?></td>
                <td><?= $row['DatumZakazivanja'] ?></td>
                <td><?= $row['DatumIzvrsenja'] ?></td>
                <td><?= $row['OpisPopravke'] ?></td>
                <td><?= $row['Status'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
