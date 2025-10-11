document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        let errorMessages = [];

        const tip = document.querySelector("input[name='tip']").value;

        if (tip === "vozilo") {
            const marka = document.querySelector("input[name='marka']");
            const model = document.querySelector("input[name='model']");
            const godiste = document.querySelector("input[name='godiste']");
            const registracija = document.querySelector("input[name='registracija']");
            const status = document.querySelector("select[name='status']");

            if (marka.value.trim() === "") {
                isValid = false;
                errorMessages.push("Marka ne sme biti prazna.");
            }

            if (model.value.trim() === "") {
                isValid = false;
                errorMessages.push("Model ne sme biti prazan.");
            }

            if (!godiste.value || godiste.value < 1900 || godiste.value > new Date().getFullYear()) {
                isValid = false;
                errorMessages.push("Godiste mora biti između 1900 i trenutne godine.");
            }

            const registracijaRegex = /^[A-ZČĆŽŠĐ]{2}-\d{3,4}-[A-ZČĆŽŠĐ]{2}$/;
            if (!registracijaRegex.test(registracija.value.trim())) {
                isValid = false;
                errorMessages.push("Registracija mora biti u formatu BG-123-AA.");
            }

            if (status.value.trim() === "") {
                isValid = false;
                errorMessages.push("Status mora biti izabran.");
            }
        }

        if (tip === "vozac") {
            const ime = document.querySelector("input[name='ime']");
            const prezime = document.querySelector("input[name='prezime']");
            const brojDozvole = document.querySelector("input[name='broj_dozvole']");
            const status = document.querySelector("select[name='status']");

            if (ime.value.trim() === "") {
                isValid = false;
                errorMessages.push("Ime ne sme biti prazno.");
            }

            if (prezime.value.trim() === "") {
                isValid = false;
                errorMessages.push("Prezime ne sme biti prazno.");
            }

            const dozvolaRegex = /^[0-9]{8}$/;
            if (!dozvolaRegex.test(brojDozvole.value.trim())) {
                isValid = false;
                errorMessages.push("Broj dozvole mora sadržati tačno 8 cifara.");
            }
            
            if (status.value.trim() === "") {
                isValid = false;
                errorMessages.push("Status mora biti izabran.");
            }
        }

        if (tip === "servis") {
            const datumZakazivanja = document.querySelector("input[name='datum_zakazivanja']");
            const datumIzvrsenja = document.querySelector("input[name='datum_izvrsenja']");
            const opisPopravke = document.querySelector("textarea[name='opis_popravke']");
            const status = document.querySelector("select[name='status']");
            
            if (datumZakazivanja.value === "") {
                isValid = false;
                errorMessages.push("Datum zakazivanja mora biti unet.");
            }

            if (datumIzvrsenja.value !== "" && datumIzvrsenja.value < datumZakazivanja.value) {
                isValid = false;
                errorMessages.push("Datum izvršenja ne može biti pre zakazanog datuma.");
            }

            if (opisPopravke.value.trim().length < 10) {
                isValid = false;
                errorMessages.push("Opis popravke mora imati najmanje 10 karaktera.");
            }

            if (status.value.trim() === "") {
                isValid = false;
                errorMessages.push("Status mora biti izabran.");
            }
        }

        // Prikazivanje grešaka
        if (!isValid) {
            event.preventDefault();
            alert("Greške u unosu:\n\n" + errorMessages.join("\n"));
        } else {
            alert("Podaci su uspešno izmenjeni.");
        }
    });
});
