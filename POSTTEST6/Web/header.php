<?php
$adminEmail = "dinda@gmail.com";

?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../img/xuensun.jpg" />
        <title>Xuensun - World Of Fanfiction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <style>
            /* CSS untuk burger menu */
            .burger-icon {
                display: none;
                cursor: pointer;
            }
            
            .navbar {
                overflow: hidden;
            }

            .navbar a {
                float: left;
                font-size: 16px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .navbar a:hover {
                color: black;
                padding: 14px 16px;
            }

            @media screen and (max-width: 800px) {
                .navbar a:not(:first-child) {display: none;}
                .navbar a.icon {
                    float: right;
                    display: block;
                }
            }

            @media screen and (max-width: 800px) {
                .navbar.responsive {position: relative;}
                .navbar.responsive a.icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }
                .navbar.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
            }
        </style>
    </head>
    <body class="light-mode">

        <header>
        <div style="font-family: bobaland;" class="navbar">
            <a style="float: left;" href="../Web/index.php">
                <img style="width: 70px;height: 50px;margin-top:5px" src="../img/xuensun.jpg" alt="Logo" class="logo">
            </a>
            <a style="width: 30px;" class="burger-icon icon" onclick="toggleMenu()">&#9776;</a>
            <?php
                if(isset($_SESSION['email'])){

                    if ($_SESSION['email'] === $adminEmail) {
            ?>
            <a style="padding-top: 40px;float: right;" href="logout.php"> <img src="../icon/logout.png"> Logout</a>
            <a style="padding-top: 40px;float: right;" href="About.php"> <img src="../icon/information.png"> About Me</a>
            <a style="padding-top: 40px;float: right;" href="profile.php"> <img src="../icon/profile.gif"> Profile</a>
            <a style="padding-top: 40px;float: right;" href="edit_profile.php"> <img src="../icon/settings.gif"> Setting</a>
            <a style="padding-top: 40px;float: right;" class="mode-button" onclick="toggleMode()">  <img src="../icon/information.png"> Mode Gelap/Terang</a>
            <?php
                    } else {
                ?>
            <a style="padding-top: 40px;float: right;" href="logout.php"> <img src="../icon/logout.png"> Logout</a>
            <a style="padding-top: 40px;float: right;" href="profile.php"> <img src="../icon/profile.gif"> Profile</a>
            <a style="padding-top: 40px;float: right;" href="edit_profile.php"> <img src="../icon/settings.gif"> Setting</a>
            <a style="padding-top: 40px;float: right;" href="About.php"> <img src="../icon/information.png"> About Me</a>
            <a style="padding-top: 40px;float: right;" href="hapus_akun.php"> <img src="../icon/hapus.gif"> Delete Account</a>
            <a style="padding-top: 40px;float: right;" class="mode-button" onclick="toggleMode()">  <img src="../icon/information.png"> Mode Gelap/Terang</a>
            <?php
                    }
                } else{
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

    <script>
        // JavaScript untuk burger menu responsif
        function toggleMenu() {
            var x = document.querySelector(".navbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>