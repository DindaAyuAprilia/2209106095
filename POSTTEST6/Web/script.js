document.getElementById("login-form").addEventListener("submit", function (event) {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const email = document.getElementById("email").value;

    if (!username || !password || !email) {
        alert("Harap isi semua kolom!");
        event.preventDefault(); // Menghentikan pengiriman formulir jika ada kolom yang kosong
    }
});


// Fungsi untuk menampilkan popup
function openPopup() {
    document.getElementById("login-popup").style.display = "block";
}

// Fungsi untuk menutup popup
function closePopup() {
    document.getElementById("login-popup").style.display = "none";
}

