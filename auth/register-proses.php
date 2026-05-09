<?php
require_once "../db/koneksi.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $jurusan = $_POST['jurusan'];
    $no_tlp = $_POST['no_tlp'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $cekKetersediaanNis = mysqli_query($koneksi, "SELECT `nis` FROM `peminjam` WHERE nis = '$nis'");
    $cekKetersediaanNama = mysqli_query($koneksi, "SELECT `nama` FROM `peminjam` WHERE nama = '$nama'");

    if (mysqli_num_rows($cekKetersediaanNis) > 0) {
        echo "<div class='alert-error'>NISN Sudah terdaftar.</div>";
    } else if (mysqli_num_rows($cekKetersediaanNama) > 0) {
        echo "<div class='alert-error'>Nama Sudah terdaftar.</div>";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $queryInsert = "INSERT INTO `peminjam`(`nistek`, `nama`, `password`, `jurusan`, `no_tlp`, `alamat`, `kelas`) VALUES ('$nis','$nama','$hashedPassword','$jurusan','$no_tlp','$alamat','$kelas')";
        $penambahanSiswa = mysqli_query($koneksi, $queryInsert);

        if ($penambahanSiswa) {
            echo "<div class='alert-success'>
                    Berhasil register! <br>
                    Anda akan dialihkan ke halaman verifikasi sebelum login.
                  </div>";
        } else {
            echo "<div class='alert-error'>Gagal register! Ada kesalahan sistem.</div>";
        }
    }
}
