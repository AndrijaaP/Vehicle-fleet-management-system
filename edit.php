<?php
$conn = new mysqli("localhost", "root", "", "vozniparkdb");

if ($conn->connect_error) {
    die("Greška pri povezivanju: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled Podataka</title>
    <link rel="stylesheet" href="izmeni.css">
</head>
<body>
    <div class="container">
        <a href="newVersion_admintable.html" class="btn-nazad">Nazad</a>
        <h2>Pregled Podataka</h2>
        
        <div class="tabs">
    <button class="tab active" data-tab="vozila">Vozila</button>
    <button class="tab" data-tab="vozaci">Vozači</button>
    <button class="tab" data-tab="servisi">Servisi</button>
</div>

<!-- VOZILA -->
<div id="vozila" class="content" style="display: block;">
    <h3>Lista svih vozila</h3>
    <table>
        <thead>
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
            <?php
            $result = $conn->query("SELECT * FROM vozila");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Marka']}</td>
                    <td>{$row['Model']}</td>
                    <td>{$row['Godiste']}</td>
                    <td>{$row['Registracija']}</td>
                    <td>{$row['Status']}</td>
                    <td><a href='edit_form.php?id={$row['ID']}&tip=vozilo' class='btn'>Izmeni</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- VOZAČI -->
<div id="vozaci" class="content" style="display: none;">
    <h3>Lista svih vozača</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Broj Dozvole</th>
                <th>Status</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM vozaci");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['Ime']}</td>
                    <td>{$row['Prezime']}</td>
                    <td>{$row['BrojDozvole']}</td>
                    <td>{$row['Status']}</td>
                    <td><a href='edit_form.php?id={$row['ID']}&tip=vozac' class='btn'>Izmeni</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- SERVISI -->
<div id="servisi" class="content" style="display: none;">
    <h3>Lista svih servisa</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vozilo ID</th>
                <th>Datum Zakazivanja</th>
                <th>Datum Izvršenja</th>
                <th>Opis Popravke</th>
                <th>Status</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM servisi");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['ID']}</td>
                    <td>{$row['VoziloID']}</td>
                    <td>{$row['DatumZakazivanja']}</td>
                    <td>{$row['DatumIzvrsenja']}</td>
                    <td>{$row['OpisPopravke']}</td>
                    <td>{$row['Status']}</td>
                    <td><a href='edit_form.php?id={$row['ID']}&tip=servis' class='btn'>Izmeni</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="prebaci_tab_izmeni.js"></script>

</body>
</html>
