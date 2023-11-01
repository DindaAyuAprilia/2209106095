<?php
require 'connection.php';
session_start();

$uploadDir = 'uploads/';

// Membuat direktori "uploads" jika tidak ada
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!isset($_SESSION['email'])) {
    header('location: login.php'); // Redirect ke halaman login jika pengguna tidak masuk
}

// Mengambil data pengguna dari database berdasarkan email pengguna yang masuk
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Kesalahan dalam mengambil data pengguna";
    // Mengatasi kesalahan yang terjadi.
}

// Mengatur jalur gambar profil pengguna
$profilePicturePath = $user['profile_picture'];
?>

<?php
require 'header.php';
?>
<br><br>

<div class="container">
    <div class="login-box">
        <div style="text-align: center;" class="logo">
            <h1>Profil Pengguna</h1>
            <div class="controls">
                <center>
                    <img style="width: 150px; height: 150px; border-radius: 100px" src="<?php echo $profilePicturePath; ?>" alt="Foto Profil">
                    <?php
                        if (empty($profilePicturePath)) {
                            echo "Foto profil tidak ditemukan.";
                        }
                    ?>
                    </center>
                
                <p><strong>Nama:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Password:</strong>
                <span id="password">
                    <?php echo str_repeat("*", strlen($user['password'])); ?> <!-- Menampilkan karakter pengganti bintang -->
                </span>
                <button id="showPassword">Tampilkan Kata Sandi</button>
                </p>
                <p><strong>Kontak:</strong> <?php echo $user['contact']; ?></p>
                <a style="background-color: #ffffff; border: #000000 1px solid; padding: 5px 10px; color: #070606; text-decoration: none; border-radius: 3px; margin: 10px 0px;" href="edit_profile.php">Edit Profile</a>
                
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk menampilkan kata sandi saat tombol diklik
    document.getElementById("showPassword").addEventListener("click", function () {
        var passwordField = document.getElementById("password");
        passwordField.innerHTML = "<?php echo $user['password']; ?>";
        this.style.display = "none"; // Menyembunyikan tombol setelah menampilkan kata sandi
    });
</script>



<?php
require 'footer.php';
?>
