<?php
// memanggil file class Kategori
require_once './class/Kategori.php';

// membuat objek baru dari class Kategori 
$kategori = new Kategori();

// memanggil fungsi tampil() untuk mengambil seluruh data kategori dari database
$data = $kategori->tampil();
?>

<!-- judul halaman -->
<h2>Daftar Kategori</h2>

<!-- tombol untuk menuju halaman tambah kategori baru -->
<a href="?page=tambah_kategori" class="button">Tambah Kategori</a>

<!-- membuat tabel untuk menampilkan seluruh data kategori -->
<table border="1" cellpadding="5">
<tr>
    <!-- header kolom tabel -->
    <th>ID</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>

<!-- melakukan looping untuk menampilkan setiap baris data kategori -->
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <!-- menampilkan id kategori -->
    <td><?= $row['id_kategori'] ?></td>
    <!-- menampilkan nama kategori -->
    <td><?= $row['nama_kategori'] ?></td>
    <td>
        <!-- tombol edit untuk ke halaman edit kategori berdasarkan id -->
        <a href="?page=edit_kategori&id=<?= $row['id_kategori'] ?>">Edit</a> |
        
        <!-- tombol hapus dengan konfirmasi sebelum data benar-benar dihapus -->
        <a href="?page=hapus_kategori&id=<?= $row['id_kategori'] ?>" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
