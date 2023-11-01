<?php
require 'connection.php';  // Mengimpor file koneksi database.
session_start();  // Memulai sesi PHP.

$uploadDir = 'uploads/';  // Direktori untuk mengunggah berkas gambar profil pengguna.

// Membuat direktori "uploads" jika belum ada.
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Memeriksa apakah berkas gambar profil diunggah dan tidak ada kesalahan.
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $originalFileName = $_FILES['profile_picture']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = date("Y-m-d") . " " . "." . $extension;

    $uploadFile = $uploadDir . $newFileName;

    // Memindahkan berkas gambar profil ke direktori yang ditentukan.
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        // Berkas berhasil diunggah, menyimpan jalur berkas di database.
        $profilePicturePath = $uploadFile;
    } else {
        echo "Kesalahan mengunggah gambar profil: " . $_FILES['profile_picture']['error'];
        // Menangani kesalahan dan mengarahkan sesuai kebutuhan.
    }
} else {
    echo "Tidak ada berkas yang diunggah atau terjadi kesalahan selama pengungahan.";
    // Menangani kasus ini sesuai kebutuhan.
}

$name = mysqli_real_escape_string($con, $_POST['name']);  // Mendapatkan dan membersihkan data nama.
$email = mysqli_real_escape_string($con, $_POST['email']);  // Mendapatkan dan membersihkan data email.
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

// Memeriksa apakah alamat email sesuai dengan pola regex.
if (!preg_match($regex_email, $email)) {
    echo "Alamat email salah. Harap isi data yang sesuai...";
    ?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
    <?php
}

$password = mysqli_real_escape_string($con, $_POST['password']);  // Mendapatkan, mengenkripsi, dan membersihkan kata sandi.

// Memeriksa panjang kata sandi.
if (strlen($password) < 6) {
    echo "Kata sandi harus memiliki setidaknya 6 karakter. Harap isi data yang sesuai...";
    ?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
    <?php
}

$contact = $_POST['contact'];  // Mendapatkan data kontak.

// Mengeksekusi kueri untuk memeriksa apakah email sudah ada di database.
$duplicate_user_query = "SELECT id FROM users WHERE email = '$email'";
$duplicate_user_result = mysqli_query($con, $duplicate_user_query) or die(mysqli_error($con));
$rows_fetched = mysqli_num_rows($duplicate_user_result);

if ($rows_fetched > 0) {
    ?>
    <script>
        window.alert("Email sudah ada dalam database kami!");
    </script>
    <meta http-equiv="refresh" content="1;url=signup.php" />
    <?php
} else {
    // Mengeksekusi kueri untuk menambahkan pengguna baru ke database.
    $user_registration_query = "INSERT INTO users (name, email, password, contact, profile_picture) 
    VALUES ('$name', '$email', '$password', '$contact', '$profilePicturePath')";

    $user_registration_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    echo "Pendaftaran pengguna berhasil";
    $_SESSION['email'] = $email;
    $_SESSION['id'] = mysqli_insert_id($con);
    ?>
    <meta http-equiv="refresh" content="3;url=index.php" />
    <?php
}
?>
