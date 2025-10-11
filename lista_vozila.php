<?php
include 'config.php'; // Konekcija sa bazom

// Dohvati sva vozila iz baze
$sql = "SELECT ID, Marka, Model, Godiste, Registracija, Status FROM Vozila";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Vozila</title>
    <link rel="stylesheet" href="obrisi_vozila.css">
    <script>
        function potvrdiBrisanje() {
            return confirm("Da li ste sigurni da želite da obrišete selektovana vozila?");
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
        <h2>Lista svih vozila</h2>

        <form action="obrisi_vozila.php" method="post" onsubmit="return potvrdiBrisanje();">
            <table border="1">
                <thead>
                    <tr>
                        <th>Izaberi</th>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Godište</th>
                        <th>Registracija</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // Checkbox i dalje koristi ID, ali ID nije prikazan
                            echo "<td><input type='checkbox' name='vozila[]' value='{$row['ID']}'></td>";
                            echo "<td>{$row['Marka']}</td>";
                            echo "<td>{$row['Model']}</td>";
                            echo "<td>{$row['Godiste']}</td>";
                            echo "<td>{$row['Registracija']}</td>";
                            echo "<td>{$row['Status']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nema vozila u bazi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <button type="submit">Obriši selektovana vozila</button>
        </form>
    </div>

</body>
</html>

<?php $conn->close(); ?>
