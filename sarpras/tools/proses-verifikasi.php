<?php
session_start();
include('../../db/koneksi.php');

global $koneksi;

$nistek = $_GET['nistek'];

$verif = mysqli_query($koneksi, "UPDATE `peminjam` SET `verifikasi` = '1' WHERE `nistek` = '$nistek'");
$peminjamRaw = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `nistek` = '$nistek'");

$namaPeminjam = mysqli_fetch_assoc($peminjamRaw);

if ($verif) {
    $_SESSION['msg-verif'] = [
        'icon' => 'success',
        'title' => 'Berhasil verifikasi peminjam!',
        'text' => "{$namaPeminjam['nama']} sudah bisa mengakses semua fitur."
    ];
} else {
    $_SESSION['msg-verif'] = [
        'icon' => 'error',
        'title' => 'Gagal verifikasi peminjam!',
        'text' => "{$namaPeminjam['nama']} tidak bisa di konfirmasi sekarang, harap coba lagi."
    ];
}

header('location: verifikasi-peminjam.php');
exit();