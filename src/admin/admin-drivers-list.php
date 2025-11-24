<?php
require __DIR__ . '/../../config/config.php';

$query = "SELECT * FROM vozaci";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled Vozača</title>
    <link rel="stylesheet" href="../../public/css/admin-overview.css">
    <script src="../../public/js/admin-overview.js" defer></script>
</head>
<body>

<div class="container">
    <h2>Pregled svih vozača</h2>
    <input type="text" id="pretragaVozaca" class="search-box" onkeyup="pretraziTabelu('pretragaVozaca', 'tabelaVozaca')" placeholder="Pretraži vozace...">
    <table id="tabelaVozaca">
        <tr>
            <th onclick="sortirajTabelu('tabelaVozaca', 0)">ID</th>
            <th onclick="sortirajTabelu('tabelaVozaca', 1)">Ime</th>
            <th onclick="sortirajTabelu('tabelaVozaca', 2)">Prezime</th>
            <th onclick="sortirajTabelu('tabelaVozaca', 3)">Broj Dozvole</th>
            <th onclick="sortirajTabelu('tabelaVozaca', 4)">Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['ID'] ?></td>
                <td><?= $row['Ime'] ?></td>
                <td><?= $row['Prezime'] ?></td>
                <td><?= $row['BrojDozvole'] ?></td>
                <td><?= $row['Status'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
