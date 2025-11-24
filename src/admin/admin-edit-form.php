<?php
require __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$tip = $_GET['tip'];

if ($tip == "vozilo") {
    $query = "SELECT * FROM vozila WHERE ID = ?";
} elseif ($tip == "vozac") {
    $query = "SELECT * FROM vozaci WHERE ID = ?";
} elseif ($tip == "servis") {
    $query = "SELECT * FROM servisi WHERE ID = ?";
} else {
    die("Nevažeći tip.");
}

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<?php
if (isset($_GET['success'])) {
    echo "<p class='success'>" . htmlspecialchars($_GET['success']) . "</p>";
} elseif (isset($_GET['error'])) {
    echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmena podataka</title>
    <link rel="stylesheet" href="../../public/css/edit-alt.css">
</head>
<body>
<div class="container">
    <a href="../../src/admin/admin-edit.php" class="btn-nazad">Nazad</a>
    <form action="../../src/handlers/update.php" method="POST">
        <h1 class="form-title">Izmeni podatke</h1>
        <div class="form-body">
            <input type="hidden" name="id" value="<?php echo $id; ?>">                                                                       
            <input type="hidden" name="tip" value="<?php echo $tip; ?>">

            <?php if ($tip == "vozilo"): ?>
                <label>Marka:</label>
                <input type="text" name="marka" value="<?php echo htmlspecialchars($row['Marka']); ?>"><br>

                <label>Model:</label>
                <input type="text" name="model" value="<?php echo htmlspecialchars($row['Model']); ?>"><br>

                <label>Godište:</label>
                <input type="number" name="godiste" value="<?php echo $row['Godiste']; ?>"><br>

                <label>Registracija:</label>
                <input type="text" name="registracija" value="<?php echo htmlspecialchars($row['Registracija']); ?>"><br>

                <label>Status:</label>
                <select name="status">
                    <option value="Dostupno" <?php if($row['Status'] == "Dostupno") echo "selected"; ?>>Dostupno</option>
                    <option value="Rezervisano" <?php if($row['Status'] == "Rezervisano") echo "selected"; ?>>Rezervisano</option>
                    <option value="Na popravci" <?php if($row['Status'] == "Na popravci") echo "selected"; ?>>Na popravci</option>
                </select><br>

            <?php elseif ($tip == "vozac"): ?>
                <label>Ime:</label>
                <input type="text" name="ime" value="<?php echo htmlspecialchars($row['Ime']); ?>"><br>

                <label>Prezime:</label>
                <input type="text" name="prezime" value="<?php echo htmlspecialchars($row['Prezime']); ?>"><br>

                <label>Broj Dozvole:</label>
                <input type="text" name="broj_dozvole" value="<?php echo htmlspecialchars($row['BrojDozvole']); ?>"><br>

                <label>Status:</label>
                <select name="status">
                    <option value="Aktivan" <?php if($row['Status'] == "Aktivan") echo "selected"; ?>>Aktivan</option>
                    <option value="Neaktivan" <?php if($row['Status'] == "Neaktivan") echo "selected"; ?>>Neaktivan</option>
                </select><br>

            <?php elseif ($tip == "servis"): ?>
                <label>Datum Zakazivanja:</label>
                <input type="date" name="datum_zakazivanja" value="<?php echo date('Y-m-d', strtotime($row['DatumZakazivanja'])); ?>"><br>

                <label>Datum Izvršenja:</label>
                <input type="date" name="datum_izvrsenja" value="<?php echo $row['DatumIzvrsenja'] ? date('Y-m-d', strtotime($row['DatumIzvrsenja'])) : ''; ?>"><br>

                <label>Opis Popravke:</label>
                <textarea name="opis_popravke"><?php echo htmlspecialchars($row['OpisPopravke']); ?></textarea><br>

                <label>Status:</label>
                <select name="status">
                    <option value="Završeno" <?php if($row['Status'] == "Završeno") echo "selected"; ?>>Završeno</option>
                    <option value="Zakazano" <?php if($row['Status'] == "Zakazano") echo "selected"; ?>>Zakazano</option>
                </select><br>
            <?php endif; ?>

            <button type="submit">Sačuvaj izmene</button>
        </div>
    </form>
</div>
<script src="../../public/js/edit.js"></script>
</body>
</html>
