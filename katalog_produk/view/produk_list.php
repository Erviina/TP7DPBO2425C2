<?php
require_once './class/Produk.php';
$produk = new Produk();
$data = $produk->tampil();
?>


<h2>Daftar Produk</h2>
<a href="?page=tambah_produk">Tambah Produk</a>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>Nama</th><th>Harga</th><th>Kategori</th><th>Supplier</th><th>Aksi</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_produk'] ?></td>
    <td><?= $row['nama_produk'] ?></td>
    <td><?= $row['harga'] ?></td>
    <td><?= $row['nama_kategori'] ?></td>
    <td><?= $row['nama_supplier'] ?></td>
    <td>
        <a href="?page=edit_produk&id=<?= $row['id_produk'] ?>">Edit</a> | 
        <a href="?page=hapus_produk&id=<?= $row['id_produk'] ?>">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
