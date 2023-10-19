<?php 
// Mulai sesi PHP
session_start();

// Memasukkan file 'connection.php' untuk menghubungkan ke database
require 'connection.php';

// Cek apakah pengguna sudah masuk (login). Jika tidak, arahkan ke halaman 'index.php'.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}

// Mengambil kata sandi lama dan baru dari formulir dan mengenkripsi mereka menggunakan md5 dan mysqli_real_escape_string
$old_password = md5(md5(mysqli_real_escape_string($con, $_POST['oldPassword'])));
$new_password = md5(md5(mysqli_real_escape_string($con, $_POST['newPassword'])));

// Mengambil data nama dan kontak dari input pengguna
$name = mysqli_real_escape_string($con, $_POST['name']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$newpassword = mysqli_real_escape_string($con, $_POST['newPassword']);

$email = $_SESSION['email'];

// Memeriksa kata sandi yang ada di database untuk email yang sedang login
$password_from_database_query = "select password from users where email='$email'";
$password_from_database_result = mysqli_query($con, $password_from_database_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($password_from_database_result);

// Jika kata sandi yang dimasukkan pengguna sama dengan kata sandi yang ada di database
if ($row['password'] == $old_password) {
    // Update kata sandi di database dengan kata sandi baru
    $update_password_query = "update users set password='$newpassword' where email='$email'";
    $update_name_query = "update users set name='$name' where email='$email'";
    $update_contact_query = "update users set contact='$contact' where email='$email'";
    $update_password_result = mysqli_query($con, $update_password_query) or die(mysqli_error($con));
    $update_name_result = mysqli_query($con, $update_name_query) or die(mysqli_error($con));
    $update_contact_result = mysqli_query($con, $update_contact_query) or die(mysqli_error($con));
    echo "Data Anda telah diperbarui.";
    ?>
    <!-- Redirect pengguna ke halaman 'index.php' setelah 3 detik -->
    <meta http-equiv="refresh" content="3;url=index.php" />
    <?php
} else {
    ?>
    <script>
        // Tampilkan pesan kesalahan kata sandi
        window.alert("Password salah!!");
    </script>
    <!-- Redirect pengguna ke halaman 'settings.php' setelah 1 detik -->
    <meta http-equiv="refresh" content="1;url=edit_profile.php" />
    <?php
}
