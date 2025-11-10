<?php
require_once './class/Kategori.php';
$kategori = new Kategori();
$data = $kategori->tampil();
?>

<h2>Daftar Kategori</h2>
<a href="?page=tambah_kategori" class="button">Tambah Kategori</a>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_kategori'] ?></td>
    <td><?= $row['nama_kategori'] ?></td>
    <td>
        <a href="?page=edit_kategori&id=<?= $row['id_kategori'] ?>">Edit</a> |
        <a href="?page=hapus_kategori&id=<?= $row['id_kategori'] ?>" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
