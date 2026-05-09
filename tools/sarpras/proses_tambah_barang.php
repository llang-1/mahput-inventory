<?php

include('../../db/koneksi.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kode_unik = $_POST['kode_unik'];
    $jenis_barang = $_POST['jenis_barang'];
    $kondisi_barang = $_POST['kondisi_barang'];
    $status_barang = $_POST['status_barang'];
    $asal_barang = $_POST['asal_barang'];
    $lokasi_barang = $_POST['lokasi_barang'];
    $spesifikasi_barang = $_POST['spesifikasi_barang'];

    $query = "INSERT INTO `barang` 
              (`nama_barang`, `jenis_barang`, `kondisi_barang`, `status_barang`, `kode_unik`, `asal_barang`, `spesifikasi_barang`, `lokasi_barang`) 
              VALUES 
              ('$nama_barang', '$jenis_barang', '$kondisi_barang', '$status_barang', '$kode_unik', '$asal_barang', '$spesifikasi_barang', '$lokasi_barang')";

    $tambahBarang = mysqli_query($koneksi, $query);

    if ($tambahBarang) {
        echo "Berhasil menambahkan barang";
    } else {
        echo "Gagal menambahkan barang: " . mysqli_error($koneksi);
    }
}