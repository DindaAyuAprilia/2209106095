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


<div class="container" >
  <div style="margin-top: 80px;" id="login-box">
    <div class="logo">
      <h1 class="logo-caption"><span class="tweak">S</span>IGN UP</h1>
    </div>
    <div>
        <div style="align-items: center; text-align:center;color:white" >
            <div style="width: 500px;" >
            <form style="width: 500px;" method="post" action="user_config.php" enctype="multipart/form-data">
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
                        <label style="color: black;" for="profile_picture">Profile Picture:</label><br>
                        <input type="file" name="profile_picture" accept="image/*">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>



<?php
// Mengimpor footer.php untuk bagian footer halaman.
require 'footer.php';
?>
