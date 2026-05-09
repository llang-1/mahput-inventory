<?php
$nistek = $_GET['nistek'];
include 'db/koneksi.php';
$hapus = mysqli_query($koneksi,"DELETE FROM `mahput_inventory` WHERE `nistek`= '$nistek'");

header("location: index.php");
?>