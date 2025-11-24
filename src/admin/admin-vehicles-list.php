<?php
require __DIR__ . '/../../config/config.php';

$query = "SELECT * FROM vozila";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled Vozila</title>
    <link rel="stylesheet" href="../../public/css/admin-overview.css">
    <script src="../../public/js/admin-overview.js" defer></script>
</head>
<body>

<div class="container">
    <h2>Pregled svih vozila</h2>
    <input type="text" id="pretragaVozila" class="search-box" onkeyup="pretraziTabelu('pretragaVozila', 'tabelaVozila')" placeholder="Pretraži vozila...">
    <table id="tabelaVozila">
        <tr>
            <th onclick="sortirajTabelu('tabelaVozila', 0)">ID</th>
            <th onclick="sortirajTabelu('tabelaVozila', 1)">Marka</th>
            <th onclick="sortirajTabelu('tabelaVozila', 2)">Model</th>
            <th onclick="sortirajTabelu('tabelaVozila', 3)">Godište</th>
            <th onclick="sortirajTabelu('tabelaVozila', 4)">Registracija</th>
            <th onclick="sortirajTabelu('tabelaVozila', 4)">Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['ID'] ?></td>
                <td><?= $row['Marka'] ?></td>
                <td><?= $row['Model'] ?></td>
                <td><?= $row['Godiste'] ?></td>
                <td><?= $row['Registracija'] ?></td>
                <td><?= $row['Status'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
