<?php
include('../db/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    $loginValid = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `nis` = '$nis'");
    $valid = mysqli_fetch_assoc($loginValid);

    if ($valid) {
        $ambilPassword = $valid['password'];
        $passwordValid = password_verify($password, $ambilPassword);

        if ($passwordValid) {
            // Berikan penanda khusus 'success' dan kirimkan ID-nya
            echo "success|" . $valid['nis']; 
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