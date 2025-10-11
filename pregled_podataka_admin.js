// Funkcija za pretragu podataka u tabeli
function pretraziTabelu(inputId, tabelaId) {
    let input = document.getElementById(inputId);
    let filter = input.value.toUpperCase();
    let tabela = document.getElementById(tabelaId);
    let redovi = tabela.getElementsByTagName("tr");

    for (let i = 1; i < redovi.length; i++) {
        let podaci = redovi[i].getElementsByTagName("td");
        let prikaziRed = false;

        for (let j = 0; j < podaci.length; j++) {
            if (podaci[j].innerText.toUpperCase().includes(filter)) {
                prikaziRed = true;
                break;
            }
        }
        redovi[i].style.display = prikaziRed ? "" : "none";
    }
}

// Funkcija za sortiranje tabele
function sortirajTabelu(tabelaId, kolona) {
    let tabela = document.getElementById(tabelaId);
    let redovi = Array.from(tabela.rows).slice(1);
    let sortirano = redovi.sort((a, b) => a.cells[kolona].innerText.localeCompare(b.cells[kolona].innerText));
    
    tabela.tBodies[0].append(...sortirano);
}
