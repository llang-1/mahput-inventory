<?php

include('../../db/koneksi.php');

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Inventaris Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .form-input-focus:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen py-10 px-4">

    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 text-center md:text-left">
            <h1 class="text-3xl font-bold text-slate-800">Manajemen Inventaris Sekolah</h1>
            <p class="text-slate-500 mt-2">Silakan lengkapi formulir di bawah ini untuk menambahkan aset barang baru ke
                sistem.</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 md:p-8">
                <form id="inventoryForm" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Barang -->
                        <div class="flex flex-col">
                            <label for="nama_barang" class="text-sm font-semibold text-slate-700 mb-2">Nama
                                Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang"
                                placeholder="Contoh: Proyektor Epson EB-X400"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 text-slate-700 form-input-focus transition-all"
                                required>
                        </div>

                        <!-- Kode Unik -->
                        <div class="flex flex-col">
                            <label for="kode_unik" class="text-sm font-semibold text-slate-700 mb-2">Kode Unik / Serial
                                Number</label>
                            <input type="text" id="kode_unik" name="kode_unik" placeholder="Contoh: INV-2023-001"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 text-slate-700 form-input-focus transition-all"
                                required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Jenis Barang -->
                        <div class="flex flex-col">
                            <label for="jenis_barang" class="text-sm font-semibold text-slate-700 mb-2">Jenis
                                Barang</label>
                            <select id="jenis_barang" name="jenis_barang"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 bg-white text-slate-700 form-input-focus transition-all"
                                required>
                                <option value="" disabled selected>Pilih Jenis</option>
                                <option value="elektronik">Elektronik</option>
                                <option value="mebel">Mebel (Furniture)</option>
                                <option value="buku">Buku / Pustaka</option>
                            </select>
                        </div>

                        <!-- Kondisi Barang -->
                        <div class="flex flex-col">
                            <label for="kondisi_barang" class="text-sm font-semibold text-slate-700 mb-2">Kondisi
                                Barang</label>
                            <select id="kondisi_barang" name="kondisi_barang"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 bg-white text-slate-700 form-input-focus transition-all"
                                required>
                                <option value="" disabled selected>Pilih Kondisi</option>
                                <option value="sangat_baik">Sangat Baik</option>
                                <option value="baik">Baik</option>
                                <option value="rusak_ringan">Rusak Ringan</option>
                                <option value="rusak_berat">Rusak Berat</option>
                            </select>
                        </div>

                        <!-- Status Barang -->
                        <div class="flex flex-col">
                            <label for="status_barang" class="text-sm font-semibold text-slate-700 mb-2">Status
                                Barang</label>
                            <select id="status_barang" name="status_barang"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 bg-white text-slate-700 form-input-focus transition-all"
                                required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="dipinjam">Sedang Dipinjam</option>
                                <option value="perbaikan">Dalam Perbaikan</option>
                                <option value="hilang">Hilang</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Asal Barang -->
                        <div class="flex flex-col">
                            <label for="asal_barang" class="text-sm font-semibold text-slate-700 mb-2">Asal
                                Barang</label>
                            <input type="text" id="asal_barang" name="asal_barang"
                                placeholder="Contoh: Dana BOS 2023 / Hibah Alumni"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 text-slate-700 form-input-focus transition-all"
                                required>
                        </div>

                        <!-- Lokasi Barang -->
                        <div class="flex flex-col">
                            <label for="lokasi_barang" class="text-sm font-semibold text-slate-700 mb-2">Lokasi
                                Penempatan</label>
                            <input type="text" id="lokasi_barang" name="lokasi_barang"
                                placeholder="Contoh: Ruang Lab Komputer 1"
                                class="border border-slate-300 rounded-lg px-4 py-2.5 text-slate-700 form-input-focus transition-all"
                                required>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="spesifikasi_barang" class="text-sm font-semibold text-slate-700 mb-2">Spesifikasi
                            Detail</label>
                        <textarea id="spesifikasi_barang" name="spesifikasi_barang" rows="4"
                            placeholder="Masukkan detail teknis, merk, tahun pembuatan, dll..."
                            class="border border-slate-300 rounded-lg px-4 py-2.5 text-slate-700 form-input-focus transition-all resize-none"></textarea>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex flex-col md:flex-row gap-3 md:justify-end">
                        <button type="button" id="btnReset"
                            class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-medium hover:bg-slate-50 transition-colors">
                            Kosongkan Form
                        </button>
                        <button type="submit"
                            class="px-8 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 shadow-md shadow-blue-200 transition-all active:scale-95">
                            Tambah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Feedback Message Area -->
        <div id="toast"
            class="fixed bottom-10 left-1/2 -translate-x-1/2 bg-slate-800 text-white px-6 py-3 rounded-full shadow-xl opacity-0 transition-opacity pointer-events-none">
            Data berhasil disimpan!
        </div>

        <!-- Footer Info -->
        <p class="text-center text-slate-400 text-sm mt-8">
            &copy; 2024 Sistem Inventaris Sekolah. Aplikasi Internal.
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('inventoryForm');
            const btnReset = document.getElementById('btnReset');
            const toast = document.getElementById('toast');

            form.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    fetch("proses-tambah-barang.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        return response.text();
    })
    .then(data => {

        toast.classList.replace('opacity-0', 'opacity-100');
        
        setTimeout(() => {
            toast.classList.replace('opacity-100', 'opacity-0');
            form.reset();
        }, 3000);
    })
    .catch(error => {

        console.error("Detail Error:", error);
    });
});

            btnReset.addEventListener('click', () => {
                if (confirm('Apakah Anda yakin ingin menghapus semua input?')) {
                    form.reset();
                }
            });
        });
    </script>
</body>

</html>