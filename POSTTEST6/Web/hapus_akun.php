<?php
require 'connection.php';  // Mengimpor file koneksi database.
session_start();  // Memulai sesi PHP.

// Memeriksa apakah pengguna sudah masuk (login). Jika tidak, arahkan ke halaman 'index.php'.
if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

$email = $_SESSION['email'];

// Hapus data pengguna dari database
$delete_user_query = "DELETE FROM users WHERE email = '$email'";
$delete_user_result = mysqli_query($con, $delete_user_query) or die(mysqli_error($con));

if ($delete_user_result) {
    // Pengguna telah dihapus dari database
    echo "Pengguna telah dihapus dari database.";

    // Logout pengguna dengan menghapus semua variabel sesi
    session_unset();
    session_destroy();

    ?>
    <!-- Redirect pengguna ke halaman 'index.php' setelah 3 detik -->
    <meta http-equiv="refresh" content="3;url=index.php" />
    <?php
} else {
    echo "Gagal menghapus pengguna. Silakan coba lagi.";
}
?>
