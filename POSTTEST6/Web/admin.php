<?php
// Memeriksa apakah pengguna sudah masuk (session 'email' telah ada), jika tidak, maka diarahkan ke halaman login.php
require 'connection.php';  // Mengimpor file koneksi database.
session_start();  // Memulai sesi PHP.

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
// Mengimpor header.php untuk bagian header halaman admin.
require 'header.php';
?>
<br><br>

<main>
    <div style="text-align: center;" class="main-content">
        <h1>Welcome, Admin!</h1>
        <p>Anda memiliki akses penuh ke pengelolaan konten di XuenSun. Gunakan kekuatan ini dengan bijak untuk mengelola cerita, pengguna, dan lebih banyak lagi.</p>
        <p>Silakan gunakan menu di atas untuk menjelajahi pilihan admin Anda.</p>
    </div>
</main>

<article class="main-content">
    <div>
    </div>
</article>

<?php
// Mengimpor footer.php untuk bagian footer halaman.
require 'footer.php';
?>
