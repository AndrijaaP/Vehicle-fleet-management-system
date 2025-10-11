<?php
require_once "config.php"; // Konekcija sa bazom

$query = "SELECT * FROM vozaci";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisanje Vozača</title>
    <link rel="stylesheet" href="brisanje_vozaca.css">
</head>
<body>
<div class="container">
    <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
    <h2>Lista Vozača</h2>

    <form id="brisanjeForm" action="obrisi_vozace.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Selektuj</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj Dozvole</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><input type="checkbox" name="vozaci[]" value="<?= $row['ID']; ?>"></td>
                        <td><?= $row['Ime']; ?></td>
                        <td><?= $row['Prezime']; ?></td>
                        <td><?= $row['BrojDozvole']; ?></td>
                        <td><?= $row['Status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <button type="submit">Obriši selektovane vozače</button>
    </form>
</div>

</body>
</html>
