<?php
include 'db/koneksi.php';
// Mengambil data dari table barang
$query = mysqli_query($koneksi, "SELECT * FROM `barang` ORDER BY id DESC");
?>  
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 p-6">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Inventaris Barang</h1>
                <p class="text-gray-500 text-sm">Kelola stok dan informasi produk Anda di sini.</p>
            </div>
            <a href="tambah_barang.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-all w-fit">
                <i class="fas fa-plus mr-2"></i> Tambah Barang
            </a>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm mb-6 flex flex-col md:flex-row gap-4 border border-gray-100">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm" placeholder="Cari nama barang...">
            </div>
            <select class="border border-gray-200 rounded-lg px-3 py-2 text-sm text-gray-600 focus:ring-blue-500">
                <option>Semua Kategori</option>
            </select>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Info Barang</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php 
                        // Cek apakah ada data
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)) { 
                        ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0 bg-blue-100 text-blue-600 rounded flex items-center justify-center">
                                        <i class="fas fa-box text-lg"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $row['nama_barang']; ?></div>
                                        <div class="text-xs text-gray-500">ID: #<?php echo $row['id']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600"><?php echo $row['kategori']; ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600"><?php echo $row['stok']; ?> Unit</td>
                            <td class="px-6 py-4">
                                <?php if($row['stok'] < 5): ?>
                                    <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Stok Tipis</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="edit_barang.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')"
                                   class="text-red-400 hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </a>
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
            
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 flex items-center justify-between">
                <span class="text-sm text-gray-500">Total: <?php echo mysqli_num_rows($query); ?> Barang</span>
            </div>
        </div>
    </div>

</body>
</html>