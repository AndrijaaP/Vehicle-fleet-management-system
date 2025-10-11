<?php
include 'config.php';

$alertScript = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marka = $_POST['marka'] ?? '';
    $model = $_POST['model'] ?? '';
    $godiste = $_POST['godiste'] ?? '';
    $registracija = $_POST['registracija'] ?? '';
    $status = $_POST['status'] ?? '';

    $registracija = strtoupper($registracija);

    $stmt = $conn->prepare("INSERT INTO Vozila (Marka, Model, Godiste, Registracija, Status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $marka, $model, $godiste, $registracija, $status);

    if ($stmt->execute()) {
        // ako je uspešno, pripremi JS alert
        $alertScript = "<script>alert('Vozilo uspešno dodato!');</script>";
    } else {
        $alertScript = "<script>alert('Greška pri dodavanju vozila: " . addslashes($stmt->error) . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Vozilo</title>
    <link rel="stylesheet" href="dodaj_vozilo.css">
    <script src="dodaj_vozilo.js" defer></script>
</head>
<body>
    <div class="form-container">
        <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
        <h2>Dodaj Novo Vozilo</h2>

        <!-- Ovde se ubacuje alert posle unosa -->
        <?= $alertScript ?>

        <form id="dodajForm" action="dodaj_vozilo.php" method="post" novalidate>
            <div class="form-group">
                <label for="marka">Marka:</label>
                <input type="text" id="marka" name="marka" required>
            </div>

            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
            </div>

            <div class="form-group">
                <label for="godiste">Godište:</label>
                <input type="number" id="godiste" name="godiste" required>
            </div>

            <div class="form-group">
                <label for="registracija">Registracija:</label>
                <input type="text" id="registracija" name="registracija" placeholder="BG-1234-AB" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Dostupno">Dostupno</option>
                    <option value="Rezervisano">Rezervisano</option>
                    <option value="Na Popravci">Na Popravci</option>
                </select>
            </div>

            <button type="submit">Dodaj Vozilo</button>
        </form>
    </div>
</body>
</html>
