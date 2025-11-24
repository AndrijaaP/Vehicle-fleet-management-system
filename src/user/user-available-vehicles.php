<?php
require __DIR__ . '/../../config/config.php';

$sql = "SELECT Marka, Model, Godiste, Registracija FROM vozila WHERE Status = 'Dostupno'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Pregled Dostupnih Vozila</title>
    <link rel="stylesheet" href="../../public/css/available-vehicles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="table-container">
        <a href="../../src/common/user-dashboard.html" class="btn-nazad">Nazad</a>
        <h2>Pregled dostupnih vozila</h2>
        <table>
            <thead>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Godište</th>
                    <th>Registracija</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Marka']}</td>
                                <td>{$row['Model']}</td>
                                <td>{$row['Godiste']}</td>
                                <td>{$row['Registracija']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-data'>Nema dostupnih vozila.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php
$conn->close();
?>
