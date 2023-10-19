<?php
// Memeriksa apakah pengguna sudah masuk (session 'email' telah ada), jika ya, maka diarahkan ke halaman products.php
require 'connection.php';  // Mengimpor file koneksi database.
session_start();  // Memulai sesi PHP.

if(isset($_SESSION['email'])){
    header('location: index.php');
}
?>

<?php
// Mengimpor header.php untuk bagian header halaman.
require 'header.php';
?>
<br><br>

<div class="container">
    <div>
        <div style="width: 1300px;align-items:center;text-align:center;" class="row">
            <div style="background-color: #0f0f0f00; border-color:white; border: 30px" class="col-xs-4 col-xs-offset-4">
                <form method="post" action="user_config.php" enctype="multipart/form-data">
                    <h1><b>SIGN UP</b></h1>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" required="true">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password (min. 6 characters)" required="true" pattern=".{6,}">
                    </div>
                    <div class="form-group">
                        <input type="tel" class = "form-control" name="contact" placeholder="Contact" required="true">
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture:</label><br>
                        <input type="file" name="profile_picture" accept="image/*"><br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
// Mengimpor footer.php untuk bagian footer halaman.
require 'footer.php';
?>
