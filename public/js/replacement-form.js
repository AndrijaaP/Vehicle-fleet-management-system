document.getElementById('zamena_korisnik').addEventListener('submit', function(event) {
    // Validacija za broj dozvole (tačno 8 cifara)
    const brojDozvole = document.getElementById('broj_dozvole').value;
    if (!/^\d{8}$/.test(brojDozvole)) {
        alert('Broj dozvole mora imati tačno 8 cifara!');
        event.preventDefault(); // Prekida slanje forme
        return;  // Prekida dalje izvršavanje
    }

    // Validacija za opis (najmanje 10 karaktera)
    const opis = document.getElementById('opis').value;
    if (opis.length < 10) {
        alert('Opis mora imati najmanje 10 karaktera.');
        event.preventDefault(); // Prekida slanje forme
        return;  // Prekida dalje izvršavanje
    }

    // Ako sve validacije prođu, pošaljemo formu i prikazujemo obaveštenje
    alert('Zahtev je uspešno poslat!');
});
