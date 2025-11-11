<?php

//mengambil file class Supplier
require_once './class/Supplier.php';

//membuat objek dari class Supplier supaya bisa akses fungsinya
$supplier = new Supplier();

// memanggil fungsi tampil() untuk mengambil dat supplier
$data = $supplier->tampil();
?>

<!-- judul halaman -->
<h2>Daftar Supplier</h2>

<!-- tombol untuk menambah data supplier baru -->
<a href="?page=tambah_supplier" class="button">Tambah Supplier</a>

<!-- tabel untuk menampilkan daftar supplier -->
<table border="1" cellpadding="5">
<tr>
     <!-- baris pertama berisi header kolom -->
    <th>ID</th>
    <th>Nama Supplier</th>
    <th>Kontak</th>
    <th>Aksi</th>
</tr>
<!-- looping untuk menampilkan data supplier dari database -->
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <!-- menampilkan id supplier -->
    <td><?= $row['id_supplier'] ?></td>

    <!-- menampilkan nama supplier -->
    <td><?= $row['nama_supplier'] ?></td>

    <!-- menampilkan kontak supplier (misal: nomor HP atau email) -->
    <td><?= $row['kontak'] ?></td>

    <!-- kolom aksi berisi tombol Edit dan Hapus -->
    <td>
        <!-- tombol edit, menuju halaman edit supplier -->
        <a href="?page=edit_supplier&id=<?= $row['id_supplier'] ?>">Edit</a> |

        <!-- tombol hapus, akan menampilkan konfirmasi sebelum hapus -->
        <a href="?page=hapus_supplier&id=<?= $row['id_supplier'] ?>" onclick="return confirm('Hapus supplier ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>