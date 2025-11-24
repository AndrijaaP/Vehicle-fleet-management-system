<?php
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$success = isset($_SESSION['success']) ? $_SESSION['success'] : "";
$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old_data']); 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava kvara</title>
    <link rel="stylesheet" href="../../public/css/user-fault.css">
</head>
<body>
   
    <div class="container">
        <a href="../../src/common/user-dashboard.html" class="btn-nazad">Nazad</a>
        <h2>Prijava kvara</h2>

        <?php if (!empty($success)): ?> 
            <p class="success-message"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form id="voziloForma" method="post" onsubmit="posaljiFormu(event)">
    <input type="number" id="voziloID" name="vozilo_id" placeholder="ID vozila" required>
    <input type="number" id="korisnikID" name="korisnik_id" placeholder="ID korisnika" required>
    <textarea name="opis" placeholder="Opis kvara" required></textarea>
    <button type="submit">Prijavi kvar</button>
</form>
    </div>
    <script src="../../public/js/report-fault.js"></script>
</body>
</html>
