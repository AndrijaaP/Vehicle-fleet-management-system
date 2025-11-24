<?php
require __DIR__ . '/../../config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija vozila</title>
    <link rel="stylesheet" href="../../public/css/reservation-form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <a href="../../src/common/user-dashboard.html" class="btn-nazad">Nazad</a>
    <div class="header">
        <h1>Rezerviši Vozilo</h1>
    </div>

    <div class="table-container">
        <h2>Dostupna vozila</h2>
        <table id="vozila-table">
            <thead>
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Godište</th>
                    <th>Registracija</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM vozila WHERE Status = 'Dostupno'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                <tr data-id="<?= $row['ID'] ?>">
                    <td><?= htmlspecialchars($row['Marka']) ?></td>
                    <td><?= htmlspecialchars($row['Model']) ?></td>
                    <td><?= htmlspecialchars($row['Godiste']) ?></td>
                    <td><?= htmlspecialchars($row['Registracija']) ?></td>
                    <td>
                        <form class="rezervacija-form" method="post">
                            <input type="hidden" name="vozilo_id" value="<?= $row['ID'] ?>">
                            <button type="submit">
                                <i class="fas fa-car-side"></i> Rezerviši
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="5" class="no-data">Nema dostupnih vozila</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.querySelectorAll('.rezervacija-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Sprečava normalni POST

        const voziloId = this.querySelector('input[name="vozilo_id"]').value;
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../src/handlers/reservation-form.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = () => {
            alert(xhr.responseText); // prikaz poruke
            if (xhr.responseText.includes('Uspešna')) {
                this.closest('tr').remove(); // ukloni red iz tabele
            }
        };

        xhr.send('vozilo_id=' + voziloId);
    });
});
</script>

</body>
</html>
