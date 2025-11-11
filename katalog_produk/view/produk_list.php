<?php
// import class produk
require_once './class/Produk.php';

// bikin objek dari class Produk
$produk = new Produk();

// ambil semua data produk dari database pakai fungsi tampil()
$data = $produk->tampil();
?>

<!-- judul halaman -->
<h2>Daftar Produk</h2>

<!-- tombol untuk menuju ke halaman tambah produk -->
<a href="?page=tambah_produk">Tambah Produk</a>

<!-- tabel untuk menampilkan daftar produk -->
<table border="1" cellpadding="5">
<tr>
    <!-- header tabel -->
    <th>ID</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Kategori</th>
    <th>Supplier</th>
    <th>Aksi</th>
</tr>

<!-- looping semua data produk dari hasil query -->
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <!-- menampilkan setiap data produk ke dalam baris tabel -->
    <td><?= $row['id_produk'] ?></td> <!-- id produk -->
    <td><?= $row['nama_produk'] ?></td> <!-- nama produk -->
    <td><?= $row['harga'] ?></td> <!-- harga produk -->
    <td><?= $row['nama_kategori'] ?></td> <!-- nama kategori (relasi dari tabel kategori) -->
    <td><?= $row['nama_supplier'] ?></td> <!-- nama supplier (relasi dari tabel supplier) -->
    
    <!-- kolom aksi untuk edit dan hapus data -->
    <td>
        <!-- tombol edit akan membuka halaman form edit berdasarkan id_produk -->
        <a href="?page=edit_produk&id=<?= $row['id_produk'] ?>">Edit</a> | 
        
        <!-- tombol hapus akan menghapus produk berdasarkan id_produk -->
        <a href="?page=hapus_produk&id=<?= $row['id_produk'] ?>">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
