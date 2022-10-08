let random = document.getElementById("internet");
let internet = document.getElementById("internetDiv");
    if (navigator.onLine) {
    }
    window.addEventListener("online", function() {
        internet.style.display = "none";
    });
    window.addEventListener('offline', function() {
        internet.style.display = "block";
        vibratePattern();
    });