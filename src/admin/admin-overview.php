<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled Podataka</title>
    <link rel="stylesheet" href="../../public/css/admin-overview.css">
    <link rel="icon" href="data:,">
</head>
<body>
<div class="container">
    <a href="../../src/common/admin-dashboard.html" class="btn-nazad">Nazad</a>
    <h2>Pregled Podataka</h2>

    <!-- Navigacija između sekcija -->
    <div class="tabs">
        <button class="tab-button active" onclick="openTab(event, 'vozila')">Vozila</button>
        <button class="tab-button" onclick="openTab(event, 'vozaci')">Vozači</button>
        <button class="tab-button" onclick="openTab(event, 'servisi')">Servisi</button>
    </div>

    <!-- Sekcija za prikaz vozila -->
    <div id="vozila" class="tab-content active">
        <?php include '../../src/admin/admin-vehicles-list.php'; ?>
    </div>

    <!-- Sekcija za prikaz vozača -->
    <div id="vozaci" class="tab-content">
        <?php include '../../src/admin/admin-drivers-list.php'; ?>
    </div>

    <!-- Sekcija za prikaz servisa -->
    <div id="servisi" class="tab-content">
        <?php include '../../src/admin/admin-services-list.php'; ?>
    </div>
</div>

<script>
function openTab(evt, tabName) {
    let i, tabcontent, tabbuttons;
 
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].classList.remove("active");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}
</script>

</body>
</html>
