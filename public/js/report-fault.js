function validacijaForme() {
    let voziloID = document.getElementById("voziloID").value.trim();
    let korisnikID = document.getElementById("korisnikID").value.trim();
    let opis = document.querySelector("textarea[name='opis']").value.trim();

    let greske = [];

    if (!voziloID) greske.push("ID vozila je obavezan.");
    if (!korisnikID) greske.push("ID korisnika je obavezan.");
    if (!opis) greske.push("Opis kvara je obavezan.");

    voziloID = parseInt(voziloID);
    korisnikID = parseInt(korisnikID);

    if (isNaN(voziloID) || voziloID <= 0) greske.push("ID vozila mora biti pozitivan broj.");
    if (isNaN(korisnikID) || korisnikID <= 0) greske.push("ID korisnika mora biti pozitivan broj.");

    if (greske.length > 0) {
        alert(greske.join("\n"));
        return false;
    }
    return true;
}

function posaljiFormu(event) {
    event.preventDefault(); // Sprecava osvezavanje stranice

    let form = document.getElementById("voziloForma");
    let formData = new FormData(form);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../src/handlers/add-fault.php", true);
    xhr.onload = function () {
        alert(this.responseText); // Prikazuje odgovor iz PHP-a kao alert
        form.reset(); // Resetuje formu nakon zatvaranja alerta
    };
    xhr.send(formData);
}
