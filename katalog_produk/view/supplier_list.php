<?php
require_once './class/Supplier.php';
$supplier = new Supplier();
$data = $supplier->tampil();
?>

<h2>Daftar Supplier</h2>
<a href="?page=tambah_supplier" class="button">Tambah Supplier</a>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama Supplier</th>
    <th>Kontak</th>
    <th>Aksi</th>
</tr>
<?php while($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_supplier'] ?></td>
    <td><?= $row['nama_supplier'] ?></td>
    <td><?= $row['kontak'] ?></td>
    <td>
        <a href="?page=edit_supplier&id=<?= $row['id_supplier'] ?>">Edit</a> |
        <a href="?page=hapus_supplier&id=<?= $row['id_supplier'] ?>" onclick="return confirm('Hapus supplier ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
