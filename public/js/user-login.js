document.querySelector(".login-form-user").addEventListener("submit", function (e) {
    e.preventDefault();

    let email = document.getElementById("user-username").value.trim();
    let password = document.getElementById("user-password").value.trim();
    let formType = "Korisnik"; 

    fetch("../../src/handlers/login.php", {
        method: "POST",
        body: new URLSearchParams({
            email: email,
            password: password,
            form_type: formType
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "error") {
            alert(data.message);
        } else if (data.status === "success") {
          window.location.href = data.redirect;
        }
    })
    .catch(err => console.error("Greška:", err));
});
