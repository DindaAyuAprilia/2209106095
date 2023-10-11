<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            font-weight: bold;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button {
            background-color: #000000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #8d8d8dcb;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }
        
        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
        }
        
        
    </style>
</head>
<body>

</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuensun - World Of Your Fanfic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="light-mode">
    <header>
        <div style="font-family: bobaland;" class="navbar">
            <a style="padding-top: 40px;float: left;" href="#">
                <img src="xuensun.jpg" alt="Logo" class="logo">
            </a>
            <a style="padding-top: 40px;float: right;" href="About.html">About Me</a>
            <a style="padding-top: 40px;float: right;" href="index.html">Home</a>

        </div>
    </header>

    <main>
        <div class="login-container">
            <h2 align="center">Login</h2>
            <form action="login.php" method="post" id="login-form">
                <div class="form-group">
                    <label for="username">Nama:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <a href="index.php"><button type="submit">Login</button></a>
            </form>
        </div>
        <script src="script.js"></script>
    </main>
    
    <div class="login-container">

    <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        echo "Nama: " . $username . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Email: " . $email. "<br>". "<br>". "<center>";
        echo "Login Berhasil, selamat datang!!!". "<br>". "</center>";

    }
    ?>

    </div>




    <footer>
        <div class="footer">
            Dinda Ayu Aprilia (2209106095)
        </div>
    </footer>
</body>
</html>

