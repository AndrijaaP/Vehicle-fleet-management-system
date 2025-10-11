function prikaziFormu(voziloID) {
    document.getElementById("voziloID").value = voziloID;
    document.getElementById("formaServis").style.display = "block";
}

function sakrijFormu() {
    document.getElementById("formaServis").style.display = "none";
}

// Dodavanje servisa
document.getElementById("servisForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "dodaj_servis.php", true);
    xhr.onload = function () {
        alert(this.responseText);
        if (this.responseText.includes("uspešno")) {
            location.reload();
        }
    };
    xhr.send(formData);
});

// Završavanje servisa
function zavrsiServis(voziloID) {
    if (confirm("Da li ste sigurni da želite da završite servis?")) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "zavrsi_servis.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Servis završen!");
                location.reload();
            }
        };

        xhr.send("vozilo_id=" + voziloID);
    }
}

