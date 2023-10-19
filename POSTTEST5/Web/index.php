
<?php
// Memeriksa apakah pengguna sudah masuk (session 'email' telah ada), jika ya, maka diarahkan ke halaman products.php
require 'connection.php';  // Mengimpor file koneksi database.
session_start();  // Memulai sesi PHP.

?>

<?php
// Mengimpor header.php untuk bagian header halaman.
require 'header.php';
?>
<br><br>

<main>
        <div style="text-align: center;" class="main-content">
            <h1>Welcome To XuenSun!</h1>
            <p>Di XuenSun, kami memahami bahwa membaca fanfic adalah bagian penting dari rutinitas harian Anda.
                Itu sebabnya kami menciptakan platform yang memungkinkan Anda mengakses fanfic favorit Anda kapan saja dan di mana saja!
                Dengan layanan berlangganan kami, Anda tidak akan pernah ketinggalan cerita yang Anda sukai.
                Anda akan menerima pemberitahuan tepat waktu untuk unggahan baru, akses eksklusif ke cerita khusus kami,
                dan kesempatan untuk membaca karya yang belum dipublikasikan sebelum orang lain. <br><br>
                Jadi mengapa menunggu?
                Berlangganan XuenSun hari ini dan dapatkan konten yang Anda idamkan, sesuai permintaan!
                Daftar sekarang dan buka dunia dengan kemungkinan membaca tanpa batas.</p>
                <?php
                if(isset($_SESSION['email'])){
                ?>
                <?php
                }else{
                ?>
                <a href="login.php"><button style="font-family: bobaland;" class="login-button">Daftar Sekarang!</button></a>
                <?php
                }
                ?>
        </div>
    </main>

    <article class="main-content">
        <div>
            <center>
            <h1 style="padding: 1px;box-shadow:300px"> 
            <img width="200" style="border-radius: 30px;" src="../img/ebook1.jpeg" alt="">
            <img width="200" style="border-radius: 30px;" src="../img/ebook3.jpeg" alt="">
            <img width="200" style="border-radius: 30px;" src="../img/ebook1.jpeg" alt=""> <br> 
            
            <button style="background-color: white;border-radius:30px;font-size:20px;padding-left:20px;padding-right:20px;">
            <b><a style="font-family: bobaland; color:rgb(0, 0, 0); text-decoration: none;"  href="#" title="Buy Now!"> Buy Now! </a></b> </button> </center></li> <br>
            <br>
            </center>
        </h1>
            </div>
    </article>


<?php
// Mengimpor footer.php untuk bagian footer halaman.
require 'footer.php';
?>