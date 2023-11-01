<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>

<?php
require 'header.php';
?>

<div class="container">
    <div style="margin-top: 80px;display: flex;
        flex-direction: column;
        align-items: center;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        min-width: 450px;
        margin: 0 auto;
        border: 1px solid black;
        background: rgba(0, 0, 0, 0.096);
        min-height: 250px;
        padding: 20px;
        z-index: 9999;">
            <div style="width: 300px;align-items:center;text-align:center;">
                <div style="align-items: center; text-align:center;color:white">
                    <h1 style="color: white;text-align:center" >Edit Profile</h1>
                    <form style="width: 300px;" method="post" action="setting_script.php" enctype="multipart/form-data">
                        <div>
                            <input style="width: 300px;" type="text" name="name" placeholder="Masukan nama baru">
                        </div>
                        <div>
                            <input style="width: 300px;" type="text" name="contact" placeholder="Masukan nomor baru">
                        </div>
                        <div>
                            <input style="width: 300px;" type="password" name="oldPassword" placeholder="Masukan password lama">
                        </div>
                        <div>
                            <input style="width: 300px;" type="password" name="newPassword" placeholder="Masukan password baru">
                        </div>
                        <div>
                            <input style="width: 300px;" type="password" name="retype" placeholder="Re-type password baru">
                        </div>
                        <div>
                            <input type="file" name="profile_picture" accept="image/*">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Change">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php
require 'footer.php';
?>
