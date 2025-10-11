document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('dodajForm');
  const registracijaInput = document.getElementById('registracija');

  registracijaInput.addEventListener('blur', (e) => {
    e.target.value = e.target.value.toUpperCase();
  });

  form.addEventListener('submit', (e) => {
    const marka = document.getElementById('marka').value.trim();
    const model = document.getElementById('model').value.trim();
    const godiste = document.getElementById('godiste').value.trim();
    const registracija = document.getElementById('registracija').value.trim().toUpperCase();
    const status = document.getElementById('status').value;

    const trenutnaGodina = new Date().getFullYear();

    if (!marka || !model || !godiste || !registracija || !status) {
      alert('Molimo popunite sva polja!');
      e.preventDefault();
      return;
    }

    const godisteNum = parseInt(godiste, 10);
    if (isNaN(godisteNum) || godisteNum < 1950 || godisteNum > trenutnaGodina) {
      alert(`Godište mora biti između 1950 i ${trenutnaGodina}!`);
      e.preventDefault();
      return;
    }
  });
});
