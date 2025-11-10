<?php
require_once './class/Supplier.php';
$supplier = new Supplier();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id_supplier'])) {
        $supplier->ubah($_POST['id_supplier'], $_POST['nama'], $_POST['kontak']);
    } else {
        $supplier->tambah($_POST['nama'], $_POST['kontak']);
    }
    header('Location: index.php?page=supplier');
    exit;
}

$dataEdit = null;
if (isset($_GET['id'])) {
    $dataEdit = $supplier->getById($_GET['id']);
}
?>

<h2><?= $dataEdit ? 'Edit Supplier' : 'Tambah Supplier' ?></h2>
<form method="POST">
    <?php if ($dataEdit): ?>
        <input type="hidden" name="id_supplier" value="<?= $dataEdit['id_supplier'] ?>">
    <?php endif; ?>
    <label>Nama Supplier:</label>
    <input type="text" name="nama" value="<?= $dataEdit['nama_supplier'] ?? '' ?>"><br>

    <label>Kontak:</label>
    <input type="text" name="kontak" value="<?= $dataEdit['kontak'] ?? '' ?>"><br>

    <button type="submit">Simpan</button>
</form>
