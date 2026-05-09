<?php
session_start();
include('../../db/koneksi.php');
global $koneksi;

$peminjamRawUnVerif = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `verifikasi` = '0'");
$peminjamRawVerif = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `verifikasi` = '1'");
// var_dump($_SESSION['msg-verif']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Siswa - Mahaputra Inventory</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">


    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .table thead th {
            background-color: #fcfcfc;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            color: #6c757d;
            border-top: none;
        }

        .icon-box {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .badge-pending {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        .badge-success {
            background-color: rgb(68, 240, 0);
            color: #3f9c00;
            border: 1px solid #d0ffba;
        }
    </style>
</head>

<body class="py-5">

    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-7">
                <h3 class="fw-bold text-dark mb-1">Verifikasi Pengguna Baru</h3>
                <p class="text-muted mb-0">Daftar siswa yang menunggu persetujuan akses sistem.</p>
            </div>
            <div class="col-md-5 text-md-end mt-3 mt-md-0">
                <button class="btn btn-outline-secondary px-4 shadow-sm fw-semibold" data-toggle="modal" data-target="#riwayatVerifikasiModal">
                    <i class="fas fa-history me-2"></i> Riwayat Verifikasi
                </button>
            </div>
        </div>

        <div class="modal fade" id="riwayatVerifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Riwayat Verifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Nama</th>
                            <th>NIS/GTK</th>
                            <th>No Tlp</th>
                            <th>Alamat</th>
                            <th class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($peminjamRawVerif) > 0) {

                            while ($row = mysqli_fetch_assoc($peminjamRawVerif)) {
                        ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box bg-info bg-opacity-10 text-info">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="fw-bold mb-0"><?= $row['nama'] ?></div>
                                                <small class="text-muted">Peminjam Aktif</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark"><?= $row['nistek'] ?></td>
                                    <td><?= $row['no_tlp'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check me-1"></i> Berhasil
                                        </span>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-5 text-center text-muted italic'>Tidak ada siswa yang menunggu verifikasi.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3 border-bottom-0">
                <div class="row g-2">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control bg-light border-start-0" placeholder="Cari NIS/GTK atau nama siswa...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Nama</th>
                            <th>NIS/GTK</th>
                            <th>No Tlp</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th class="pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($peminjamRawUnVerif) > 0) {

                            while ($row = mysqli_fetch_assoc($peminjamRawUnVerif)) {
                        ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box bg-info bg-opacity-10 text-info">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="fw-bold mb-0"><?= $row['nama'] ?></div>
                                                <small class="text-muted">Peminjam Aktif</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark"><?= $row['nistek'] ?></td>
                                    <td><?= $row['no_tlp'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <span class="badge badge-pending">
                                            <i class="fas fa-clock me-1"></i> Menunggu
                                        </span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <a href="proses-verifikasi.php?nistek=<?= $row['nistek'] ?>&status=setuju" class="btn btn-action btn-outline-success" title="Setujui">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-5 text-center text-muted italic'>Tidak ada siswa yang menunggu verifikasi.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-3 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted small">Menampilkan daftar tunggu verifikasi</p>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (isset($_SESSION['msg-verif'])): ?>
            Swal.fire({
                title: '<?= $_SESSION['msg-verif']['title'] ?>',
                icon: '<?= $_SESSION['msg-verif']['icon'] ?>',
                text: '<?= $_SESSION['msg-verif']['text'] ?>'
            })
        <?php
            unset($_SESSION['msg-verif']);
        endif;
        ?>
    </script>
</body>

</html>