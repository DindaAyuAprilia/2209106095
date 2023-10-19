<?php
    require 'connection.php';  // Memasukkan file koneksi ke database.
    session_start();  // Memulai sesi PHP.

    $email = mysqli_real_escape_string($con, $_POST['email']);  // Mengambil alamat email dari data POST dan membersihkannya.
    $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";  // Pola regex untuk memeriksa apakah alamat email valid.

    if (!preg_match($regex_email, $email)) {
        // Jika alamat email tidak valid, tampilkan pesan kesalahan dan arahkan kembali ke halaman login.
        echo "Email tidak valid. Anda akan diarahkan kembali ke halaman login...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }

    $password = md5(md5(mysqli_real_escape_string($con, $_POST['password'])));  // Mengambil, mengenkripsi, dan membersihkan kata sandi.

    if (strlen($password) < 6) {
        // Jika kata sandi kurang dari 6 karakter, tampilkan pesan kesalahan dan arahkan kembali ke halaman login.
        echo "Kata sandi harus memiliki setidaknya 6 karakter. Anda akan diarahkan kembali ke halaman login...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }

    $user_authentication_query = "select id, email from users where email='$email' and password='$password'";  // Kueri untuk mengautentikasi pengguna.
    $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));  // Menjalankan kueri dan menangani kesalahan jika ada.
    $rows_fetched = mysqli_num_rows($user_authentication_result);  // Menghitung jumlah baris yang ditemukan.

    if ($rows_fetched == 0) {
        // Jika tidak ada pengguna yang ditemukan, tampilkan pesan kesalahan dan arahkan kembali ke halaman login.
        ?>
        <script>
            window.alert("Nama pengguna atau kata sandi salah");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    } else {
        $row = mysqli_fetch_array($user_authentication_result);  // Mengambil data pengguna yang berhasil diotentikasi.
        $_SESSION['email'] = $email;  // Menyimpan alamat email pengguna dalam sesi.
        $_SESSION['id'] = $row['id'];  // Menyimpan ID pengguna dalam sesi.
        header('location: index.php');  // Mengarahkan ke halaman produk jika berhasil masuk.
    }
?>
