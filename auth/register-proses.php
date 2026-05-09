<?php
require_once("../db/koneksi.php");
global $koneksi;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nistek = $_POST['nistek'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    $cekKetersediaanNis = mysqli_query($koneksi, "SELECT `nistek` FROM `peminjam` WHERE nistek = '$nistek'");
    $cekKetersediaanNama = mysqli_query($koneksi, "SELECT `nama` FROM `peminjam` WHERE nama = '$nama'");



    if (mysqli_num_rows($cekKetersediaanNis) > 0) {
        echo "<div class='alert-error'>NIS/GTK Sudah terdaftar.</div>";
    } else if (mysqli_num_rows($cekKetersediaanNama) > 0) {
        echo "<div class='alert-error'>Nama Sudah terdaftar.</div>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $queryInsert = "INSERT INTO `peminjam`(`nistek`, `nama`, `password`, `no_tlp`, `alamat`) VALUES ('$nistek','$nama','$hashedPassword','$no_tlp','$alamat')";
        $penambahanSiswa = mysqli_query($koneksi, $queryInsert);

        if ($penambahanSiswa) {
            echo "success|" . $nistek;
        } else {
            echo "<div class='alert-error'>Gagal register! Ada kesalahan sistem.</div>";
        }
    }
}
