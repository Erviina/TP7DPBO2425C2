<?php
require_once './class/Kategori.php';
$kategori = new Kategori();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id_kategori'])) {
        $kategori->ubah($_POST['id_kategori'], $_POST['nama']);
    } else {
        $kategori->tambah($_POST['nama']);
    }
    header('Location: index.php?page=kategori');
    exit;
}

$dataEdit = null;
if (isset($_GET['id'])) {
    $dataEdit = $kategori->getById($_GET['id']);
}
?>

<h2><?= $dataEdit ? 'Edit Kategori' : 'Tambah Kategori' ?></h2>
<form method="POST">
    <?php if ($dataEdit): ?>
        <input type="hidden" name="id_kategori" value="<?= $dataEdit['id_kategori'] ?>">
    <?php endif; ?>
    <label>Nama Kategori:</label>
    <input type="text" name="nama" value="<?= $dataEdit['nama_kategori'] ?? '' ?>">
    <button type="submit">Simpan</button>
</form>
