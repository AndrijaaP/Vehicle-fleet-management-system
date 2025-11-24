<?php
require __DIR__ . '/../../config/config.php';
$sql = "SELECT * FROM kvarovi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Prijavljeni kvarovi</title>
    <link rel="stylesheet" href="../../public/css/admin-faults.css">
</head>
<body>
<div class="container">
    <a href="../../src/common/admin-dashboard.html" class="btn-nazad">Nazad</a>
    <table>
        <!-- Naslov je sada deo tabele -->
        <tr>
            <th colspan="7" class="table-title">Pregled prijavljenih kvarova</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Vozilo</th>
            <th>Vozač</th>
            <th>Opis</th>
            <th>Datum prijave</th>
            <th>Status</th>
            <th>Akcija</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['VoziloID']; ?></td>
            <td><?php echo $row['KorisnikID']; ?></td>
            <td><?php echo $row['Opis']; ?></td>
            <td><?php echo $row['DatumPrijave']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td>
                <form action="../../src/handlers/update-status.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                    <select name="status">
                        <option value="Prijavljen" <?php if($row['Status'] == 'Prijavljen') echo 'selected'; ?>>Prijavljen</option>
                        <option value="Popravljen" <?php if($row['Status'] == 'Popravljen') echo 'selected'; ?>>Popravljen</option>
                    </select>
                    <button type="submit">Izmeni status</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

