<?php 
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}

$old_password = mysqli_real_escape_string($con, $_POST['oldPassword']);
$new_password = mysqli_real_escape_string($con, $_POST['newPassword']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$newpassword = mysqli_real_escape_string($con, $_POST['newPassword']);
$email = $_SESSION['email'];

if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    // Hapus gambar profil lama (jika ada)
    $query = "SELECT profile_picture FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $oldProfilePicture = $row['profile_picture'];
        if (file_exists($oldProfilePicture)) {
            unlink($oldProfilePicture);
        }
    }

    // Simpan gambar profil yang baru diunggah
    $uploadDir = 'uploads/';
    $originalFileName = $_FILES['profile_picture']['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = date("Y-m-d") . "." . $extension;
    $uploadFile = $uploadDir . $newFileName;

    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        $profilePicturePath = $uploadFile;
    }
}

$password_from_database_query = "SELECT password FROM users WHERE email='$email'";
$password_from_database_result = mysqli_query($con, $password_from_database_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($password_from_database_result);

if ($row['password'] == $old_password) {
    $update_password_query = "UPDATE users SET password='$newpassword' WHERE email='$email'";
    $update_name_query = "UPDATE users SET name='$name' WHERE email='$email'";
    $update_contact_query = "UPDATE users SET contact='$contact' WHERE email='$email'";
    if (isset($profilePicturePath)) {
        $update_profile_picture_query = "UPDATE users SET profile_picture='$profilePicturePath' WHERE email='$email'";
        mysqli_query($con, $update_profile_picture_query) or die(mysqli_error($con));
    }

    $update_password_result = mysqli_query($con, $update_password_query) or die(mysqli_error($con));
    $update_name_result = mysqli_query($con, $update_name_query) or die(mysqli_error($con));
    $update_contact_result = mysqli_query($con, $update_contact_query) or die(mysqli_error($con));
    echo "Data Anda telah diperbarui.";
    ?>
    <meta http-equiv="refresh" content="3;url=index.php" />
    <?php
} else {
    ?>
    <script>
        window.alert("Password salah!!");
    </script>
    <meta http-equiv="refresh" content="1;url=edit_profile.php" />
    <?php
}
?>
