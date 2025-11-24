function potvrdiLogout() {
    let potvrda = confirm("Da li ste sigurni da želite da se odjavite?");
    if (potvrda) {
        window.location.href = "../../index.html"; 
    }
    else
    {
        return false;
    }
}
