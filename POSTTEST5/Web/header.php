<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../img/xuensun.jpg" />
        <title>Xuensun - World Of Fanfiction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body class="light-mode">

        <header>
        <div style="font-family: bobaland;" class="navbar">
            <a style="float: left;" href="#">
                <img style="width: 70px;height: 50px;" src="../img/xuensun.jpg" alt="Logo" class="logo">
            </a>
            <?php
                if(isset($_SESSION['email'])){
                ?>
                <a style="padding-top: 40px;float: right;" href="logout.php"> <img src="../icon/logout.png"> Logout</a>
            <a style="padding-top: 40px;float: right;" href="profile.php"> <img src="../icon/profile.gif"> Profile</a>
            <a style="padding-top: 40px;float: right;" href="edit_profil.php"> <img src="../icon/settings.gif"> Setting</a>
            <a style="padding-top: 40px;float: right;" href="About.php"> <img src="../icon/information.png"> About Me</a>
            <a style="padding-top: 40px;float: right;" href="hapus_akun.php"> <img src="../icon/hapus.gif"> Delete Account</a>
            <a style="padding-top: 40px;float: right;" class="mode-button" onclick="toggleMode()">  <img src="../icon/information.png"> Mode Gelap/Terang</a>
            <?php
                }else{
            ?>
            <a style="padding-top: 40px;float: right;" href="signup.php"> <img src="../icon/signup.png"> Sign Up</a>
            <a style="padding-top: 40px;float: right;" href="login.php"> <img src="../icon/login.gif"> Login </a>
            <a style="padding-top: 40px;float: right;" href="About.php"> <img src="../icon/information.png"> About Me</a>
            <a style="padding-top: 40px;float: right;" class="mode-button" onclick="toggleMode()">  <img src="../icon/information.png"> Mode Gelap/Terang</a>
            <?php
            }
            ?>
        </div>
    </header>