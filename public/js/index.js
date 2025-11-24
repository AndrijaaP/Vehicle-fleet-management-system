document.querySelector(".contact-form").addEventListener("submit", function(e){
    e.preventDefault(); // zaustavlja odmah submit

    let firstName = document.getElementById("first-name").value.trim();
    let lastName = document.querySelector("input[name='last-name']").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let message = document.getElementById("message").value.trim();

    // Provera praznih polja
    if(!firstName || !lastName || !email || !phone || !message){
        alert("Molimo popunite sva polja označena sa *.");
        return;
    }

    // Email regex
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        alert("Unesite validnu email adresu!");
        return;
    }

    // Telefon regex (Srbija +381 9 cifara)
    let phoneRegex = /^\+381\d{8,9}$/;
    if(!phoneRegex.test(phone)){
        alert("Unesite validan broj telefona u formatu +381xxxxxxxxx");
        return;
    }

    // Minimalna duzina poruke
    if(message.length < 10){
        alert("Poruka mora imati bar 10 karaktera!");
        return;
    }

    // Ako je sve ok
    alert("Hvala na poruci, uskoro će vam se neko iz našeg tima javiti!");
    this.submit(); // šalje formu normalno
});
