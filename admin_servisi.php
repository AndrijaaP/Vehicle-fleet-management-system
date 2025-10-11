<?php
include 'config.php';

// Učitavanje svih vozila
$query = "SELECT * FROM vozila";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servis vozila</title>
    <link rel="stylesheet" href="servis1.css">
</head>
<body>
 <div class="container">
        <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="7" class="table-title">Upravljanje servisima</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Godište</th>
                    <th>Registracija</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= htmlspecialchars($row['Marka']) ?></td>
                    <td><?= htmlspecialchars($row['Model']) ?></td>
                    <td><?= $row['Godiste'] ?></td>
                    <td><?= htmlspecialchars($row['Registracija']) ?></td>
                    <td><?= $row['Status'] ?></td>
                    <td>
                        <?php if ($row['Status'] != 'Na popravci'): ?>
                            <button class="zakazi" onclick="prikaziFormu(<?= $row['ID'] ?>)">Zakaži servis</button>
                        <?php else: ?>
                            <button class="zavrsi" onclick="zavrsiServis(<?= $row['ID'] ?>)">Završi servis</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div id="formaServis">
        <h3>Zakaži servis</h3>
        <form id="servisForm">
            <input type="hidden" id="voziloID" name="voziloID">
            
            <label>Datum zakazivanja:</label>
            <input type="datetime-local" name="datumZakazivanja" required>

            <label>Datum izvršenja:</label>
            <input type="datetime-local" name="datumIzvrsenja" required>

            <label>Opis kvara:</label>
            <textarea name="opis" required></textarea>
            
            <button type="submit">Sačuvaj</button>
            <button type="button" onclick="sakrijFormu()">Otkaži</button>
        </form>
    </div>

    <script src="servisi.js"></script>
</body>
</html>



