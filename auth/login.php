<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Mahput Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h3 class="text-center mb-4">Form Login</h3>

            <div id="display"></div>

            <form id="form">
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const form = document.getElementById('form');
    const displayRespon = document.getElementById('display');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        displayRespon.innerHTML = '<div class="alert alert-info">Memproses...</div>';

        const dataForm = new FormData(form);

        fetch('login-proses.php', {
            body: dataForm,
            method: "POST"
        })
        .then(response => response.text())
        .then(data => {
            // Logika Einstein: Cek apakah string mengandung 'success'
            if (data.includes('success')) {
                // Pecah string untuk mengambil ID (nis)
                const part = data.split('|');
                const id = part[1];

                displayRespon.innerHTML = "<div class='alert-success'>Berhasil login! Mengalihkan...</div>";
                
                // Eksekusi pengalihan di sini, di lingkungan JS yang hidup
                setTimeout(() => {
                    window.location.href = `verifikasi.php?nistek=${id}`;
                }, 1000); 
            } else {
                // Tampilkan pesan error jika bukan 'success'
                displayRespon.innerHTML = data;
            }
        })
        .catch(error => {
            displayRespon.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
        });
    });
</script>
</body>
</html>