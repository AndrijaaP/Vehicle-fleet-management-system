document.querySelector(".login-form-admin").addEventListener("submit", function (e) {
    e.preventDefault();

    let email = document.getElementById("admin-username").value.trim();
    let password = document.getElementById("admin-password").value.trim();
    let formType = "Admin"; 

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

