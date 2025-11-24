<?php
require __DIR__ . '/../../config/config.php'; // Uključivanje konekcije sa bazom

// Dobijanje svih zahteva
$sql = "SELECT * FROM zahtevi ORDER BY ID DESC";
$result = $conn->query($sql);

// Proveravamo da li postoje podaci
if ($result->num_rows > 0) {
    // Prikazivanje podataka
    $zahtevi = [];
    while ($row = $result->fetch_assoc()) {
        $zahtevi[] = $row;
    }
} else {
    $zahtevi = [];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox - Administrator</title>
    <link rel="stylesheet" href="../../public/css/admin-inbox.css">
</head>
<body>
    <div class="container">
        <a href="../../src/common/admin-dashboard.html" class="btn-nazad">Nazad</a>
        <h1>Inbox - Pristigli zahtevi</h1>
        
        <?php if (empty($zahtevi)): ?>
            <div class="no-requests">
                <p>Trenutno nema zahteva.</p>
            </div>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Broj dozvole</th>
                            <th>Tip zahteva</th>
                            <th>Opis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($zahtevi as $zahtev): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($zahtev['Ime']); ?></td>
                                <td><?php echo htmlspecialchars($zahtev['Prezime']); ?></td>
                                <td><?php echo htmlspecialchars($zahtev['BrojDozvole']); ?></td>
                                <td><?php echo htmlspecialchars($zahtev['TipZahteva']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($zahtev['Opis'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
