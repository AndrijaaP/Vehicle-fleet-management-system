document.addEventListener("DOMContentLoaded", function() {
    const tabButtons = document.querySelectorAll(".tab");
    const tabContents = document.querySelectorAll(".content");

    tabButtons.forEach(button => {
        button.addEventListener("click", function() {
            let tabName = this.getAttribute("data-tab");

           
            tabContents.forEach(content => content.style.display = "none");

            
            tabButtons.forEach(btn => btn.classList.remove("active"));

           
            document.getElementById(tabName).style.display = "block";
            this.classList.add("active");
        });
    });

    
    document.querySelector(".content").style.display = "block";
});
