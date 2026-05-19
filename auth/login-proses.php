<?php
session_start();
require('../db/koneksi.php');
global $koneksi;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nistek = $_POST['nistek'];
    $password = $_POST['password'];

    $loginValid = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `nistek` = '$nistek'");
    $valid = mysqli_fetch_assoc($loginValid);

    if ($valid) {
        $ambilPassword = $valid['password'];
        $passwordValid = password_verify($password, $ambilPassword);

        if ($passwordValid) {
            echo "success"; 
            $_SESSION['token-login'] = $nistek;
            exit;
        } else {
            echo "<div class='alert-error'>Gagal login <br> Password invalid.</div>";
            exit;
        }
    } else {
        echo "<div class='alert-error'>Gagal login <br> Akun tidak ditemukan.</div>";
        exit;
    }
}
?>