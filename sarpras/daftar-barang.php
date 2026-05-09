<?php
include '../db/koneksi.php';
global $koneksi;
$barangRaw = mysqli_query($koneksi, "SELECT * FROM `barang`");

?>  
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Tabel Inventaris - Bootstrap</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); }
        .table thead th { background-color: #fcfcfc; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 0.05em; color: #6c757d; border-top: none; }
        .icon-box { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; border-radius: 10px; }
        .btn-action { width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; }
    </style>
</head>
<body class="py-5">

    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-7">
                <h3 class="fw-bold text-dark mb-1">Manajemen Inventaris</h3>
                <p class="text-muted mb-0">Daftar barang yang tersedia di gudang pusat.</p>
            </div>
            <div class="col-md-5 text-md-end mt-3 mt-md-0">
                <a href="tools/tambah_barang.php" class="btn btn-primary px-4 shadow-sm fw-semibold">
                    <i class="fas fa-plus me-2"></i> Tambah Barang
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3 border-bottom-0">
                <div class="row g-2">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" class="form-control bg-light border-start-0" placeholder="Cari barang...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Nama barang</th>
                            <th>Kondisi barang</th>
                            <th>Kode barang</th>
                            <th>Asal barang</th>
                            <th>Status barang</th>
                            <th>Spesifikasi barang</th>
                            <th>Lokasi barang</th>
                            <th class="pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (mysqli_num_rows($barangRaw) > 0) {

                            while($row = mysqli_fetch_assoc($barangRaw)) {
                        ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold mb-0"><?= $row['nama_barang'] ?></div>
                                        <small class="text-muted"><?= $row['jenis_barang'] ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php 
                                    if ($row['kondisi_barang'] === 'sangat_baik') {
                                        echo <<<HTML
                                            <span class="badge bg-success text-dark border">{$row['kondisi_barang']}</span>
                                        HTML;
                                    } elseif ($row['kondisi_barang'] === 'baik') {
                                        echo <<<HTML
                                            <span class="badge bg-info text-dark border">{$row['kondisi_barang']}</span>
                                        HTML;
                                    } elseif ($row['kondisi_barang'] === 'rusak_ringan') {
                                        echo <<<HTML
                                            <span class="badge bg-warning text-dark border">{$row['kondisi_barang']}</span>
                                        HTML;
                                    } elseif ($row['kondisi_barang'] === 'rusak_berat') {
                                        echo <<<HTML
                                            <span class="badge bg-danger text-dark border">{$row['kondisi_barang']}</span>
                                        HTML;
                                    }
                                ?>
                            </td>
                            <td class="fw-bold">
                                <?= $row['kode_unik'] ?>
                            </td>
                            <td class="fw-bold">
                                <?= $row['asal_barang'] ?>
                            </td>
                            <td>
                                <?php 
                                    if ($row['status_barang'] === 'tersedia') {
                                        echo <<<HTML
                                            <span class="badge bg-success text-dark border">{$row['status_barang']}</span>
                                        HTML;
                                    } elseif ($row['status_barang'] === 'dipinjam') {
                                        echo <<<HTML
                                            <span class="badge bg-info text-dark border">{$row['status_barang']}</span>
                                        HTML;
                                    } elseif ($row['status_barang'] === 'perbaikan') {
                                        echo <<<HTML
                                            <span class="badge bg-warning text-dark border">{$row['status_barang']}</span>
                                        HTML;
                                    } elseif ($row['status_barang'] === 'hilang') {
                                        echo <<<HTML
                                            <span class="badge bg-danger text-dark border">{$row['status_barang']}</span>
                                        HTML;
                                    }
                                ?>
                            </td>
                            <td>
                                <span class="fw-bold">
                                    <?= $row['spesifikasi_barang'] ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold">
                                    <?= $row['lokasi_barang'] ?>
                                </span>
                            </td>
                            <td class="pe-4 text-end">
                                <a href="" class="btn btn-action btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-action btn-outline-danger ms-1"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
                            }
                            } else {
                                echo "<tr><td colspan='6' class='px-6 py-10 text-center text-gray-500'>Belum ada data barang.</td></tr>";   
                            }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white py-3 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted small">Menampilkan daftar barang</p>
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
</body>
</html>