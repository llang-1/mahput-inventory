<?php
session_start();

if(isset($_SESSION['token-login'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Mahput Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .register-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert-success {

            background-color: #d4edda;

            color: #155724;

            border: 1px solid #c3e6cb;

            padding: 10px;

            border-radius: 5px;

        }



        .alert-error {

            background-color: #f8d7da;

            color: #721c24;

            border: 1px solid #f5c6cb;

            padding: 10px;

            border-radius: 5px;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="register-container">
            <h3 class="text-center mb-4">Form Registrasi</h3>

            <!-- <div id="display"></div> -->

            <form id="form">
                <div class="mb-3">
                    <label class="form-label">NIS/GTK</label>
                    <input type="text" name="nistek" class="form-control" placeholder="Masukkan NIS/GTK" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>



                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="no_tlp" class="form-control" placeholder="08xxxxxx">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap"></textarea>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register Sekarang</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <script>
        const form = document.getElementById('form');
        const displayRespon = document.getElementById('display');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            displayRespon.innerHTML = '<div class="alert alert-info" role="alert">Memproses...</div>';

            const dataForm = new FormData(form);

            fetch('register-proses.php', {
                    body: dataForm,
                    method: "POST"
                })
                .then(response => response.text())
                .then(data => {
                    displayRespon.innerHTML = data;

                    if (data.includes('success')) {
                        const potong = data.split('|');
                        const nistek = potong[1];

                        // displayRespon.innerHTML = "<div class='alert-success'>Berhasil register! </div>";
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil register',
                            text: 'silahkan tunggu untuk beralih ke tahap verifikasi...'
                        })
                        setTimeout(() => {
                            window.location.href = `halaman-tunggu.php?nistek=${nistek}`;
                        }, 2000);
                    }
                })
                .catch(error => {
                    displayRespon.innerHTML = `<div class="alert alert-danger" role="alert">Error: ${error.message}</div>`;
                });
        });
    </script>

</body>

</html>