<?php
require __DIR__ . '/../../config/config.php';

session_start();
$korisnik_id = $_SESSION['user_id'];

// Učitavanje rezervacija korisnika
$sql = "SELECT r.ID, v.Marka, v.Model, r.DatumRezervacije 
        FROM rezervacije r 
        JOIN vozila v ON r.VoziloID = v.ID
        WHERE r.KorisnikID = $korisnik_id AND r.Status = 'Aktivna'
        ORDER BY r.DatumRezervacije DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje rezervacije</title>
    <link rel="stylesheet" href="../../public/css/user-reservations.css">
</head>
<body>

<div class="container">
    <a href="../../src/common/user-dashboard.html" class="btn-nazad">Nazad</a>
    <div class="table-container">
        <table>
            <thead>
                <tr class="table-title">
                    <th colspan="4">Moje Rezervacije</th>
                </tr>
                <tr class="table-subtitle">
                    <th colspan="4">Pregled rezervisanih vozila</th>
                </tr>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Datum rezervacije</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['Marka']) ?></td>
                    <td><?= htmlspecialchars($row['Model']) ?></td>
                    <td><?= htmlspecialchars($row['DatumRezervacije']) ?></td>
                    <td>
                        <form action="../../src/handlers/cancel-reservation.php" method="post">
                            <input type="hidden" name="rezervacija_id" value="<?= $row['ID'] ?>">
                            <button type="submit" class="cancel">Otkaži rezervaciju</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

