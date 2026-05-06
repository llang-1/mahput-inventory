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

    $cekKetersediaanNis = mysqli_query($koneksi, "SELECT `nis` FROM `siswa` WHERE nis = '$nis'");

    if (mysqli_num_rows($cekKetersediaanNis) > 0) {
        echo "<div class='alert-error'>NISN Sudah terdaftar.</div>";
    } else {
        $queryInsert = "INSERT INTO `siswa`(`nis`, `nama`, `password`, `jurusan`, `no_tlp`, `alamat`, `kelas`) VALUES ('$nis','$nama','$password','$jurusan','$no_tlp','$alamat','$kelas')";

        $penambahanSiswa = mysqli_query($koneksi, $queryInsert);

        if ($penambahanSiswa) {
            echo "<div class='alert-success'>
                    Berhasil register! <br>
                    Anda akan dialihkan ke halaman verifikasi sebelum login.
                    <script>
                        setTimeout(function(){
                            window.location.href = 'verifikasi.php';
                        }, 3000);
                    </script>
                  </div>";
        } else {
            echo "<div class='alert-error'>Gagal register! Ada kesalahan sistem.</div>";
        }
    }
}
