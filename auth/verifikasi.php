<?php
include('../db/koneksi.php');
$nistek = $_GET['nistek'];
$peminjamRaw = mysqli_query($koneksi, "SELECT * FROM `peminjam` WHERE `nistek` = '$nistek'");
$peminjam = mysqli_fetch_array($peminjamRaw);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Konfirmasi | Mahput Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes pulse-soft {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(0.95); }
        }
        .pulse-animation {
            animation: pulse-soft 2s infinite ease-in-out;
        }
        .step-active {
            color: #0d6efd;
            border-left: 3px solid #0d6efd;
        }
        .step-pending {
            color: #adb5bd;
            border-left: 3px solid #dee2e6;
        }
        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
        }
        .card-glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>

   

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card card-glass shadow-lg p-4 text-center">
                    <div class="mb-4">
                        <div class="display-1 text-warning pulse-animation">
                            <i class="fas fa-clock-rotate-left"></i>
                        </div>
                    </div>
                    
                    <h2 class="fw-bold mb-2">Permintaan Diproses</h2>
                    <p class="text-muted">Halo, <strong><?php echo $peminjam['nama'] ?></strong>. Silahkan pergi keruangan sarpras untuk melanjutkan proses aktivasi akun kamu.</p>

                    <div class="text-start my-5 px-4">
                        <div class="d-flex align-items-center mb-4 step-active ps-3">
                            <div class="me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Pembuatan akun berhasil!</h6>
                                <small class="text-muted">Data sudah masuk ke database</small>
                            </div>
                        </div>

                    </div>

                    <div class="border-top pt-4">
                        <div class="alert alert-secondary d-flex align-items-center" role="alert">
                            <i class="fas fa-circle-info me-3"></i>
                            <div class="text-start small">
                                Halaman ini akan diperbarui secara otomatis jika status berubah. Anda juga bisa mengecek berkala.
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3">
                            <button onclick="checkStatus()" class="btn btn-primary px-4 rounded-pill">
                                <i class="fas fa-sync-alt me-2"></i> Refresh Status
                            </button>
                            <a href="dashboard.php" class="btn btn-outline-secondary px-4 rounded-pill">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>

                <p class="text-center text-muted mt-4 small">
                    &copy; 2023 Mahput Inventory System - SMK Hebat
                </p>
            </div>
        </div>
    </div>

    <script>
        // Fungsi simulasi untuk mengecek status (bisa dihubungkan dengan fetch API nanti)
        function checkStatus() {
            const btn = event.currentTarget;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengecek...';
            btn.disabled = true;

            // Simulasi loading 1.5 detik
            setTimeout(() => {
                
                btn.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Refresh Status';
                btn.disabled = false;
                
                // Pesan simulasi
                console.log("Status saat ini: Masih Pending.");
            }, 1500);
        }

        // Auto-refresh setiap 30 detik untuk kenyamanan pengguna
        setInterval(() => {
            console.log("Auto-refreshing status...");
            // location.reload(); // Aktifkan ini jika ingin refresh otomatis sungguhan
        }, 30000);
    </script>

</body>
</html>