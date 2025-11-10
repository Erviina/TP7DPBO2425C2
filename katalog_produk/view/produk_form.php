<?php
require_once './class/Produk.php';
require_once './class/Kategori.php';
require_once './class/Supplier.php';

$kategori = new Kategori();
$supplier = new Supplier();
$produk = new Produk();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_produk']) && $_POST['id_produk'] != '') {
        $produk->ubah($_POST['id_produk'], $_POST['nama'], $_POST['harga'], $_POST['kategori'], $_POST['supplier']);
    } else {
        $produk->tambah($_POST['nama'], $_POST['harga'], $_POST['kategori'], $_POST['supplier']);
    }
    header('Location: index.php?page=produk');
    exit;
}

$dataEdit = null;
if (isset($_GET['id'])) {
    $dataEdit = $produk->getById($_GET['id']);
}
?>

<h2><?= $dataEdit ? 'Edit Produk' : 'Tambah Produk' ?></h2>
<form method="POST">
    <?php if ($dataEdit): ?>
        <input type="hidden" name="id_produk" value="<?= $dataEdit['id_produk'] ?>">
    <?php endif; ?>

    <label>Nama Produk:</label>
    <input type="text" name="nama" value="<?= $dataEdit['nama_produk'] ?? '' ?>"><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="<?= $dataEdit['harga'] ?? '' ?>"><br>

    <label>Kategori:</label>
    <select name="kategori">
        <?php 
        $kats = $kategori->tampil();
        while ($k = $kats->fetch_assoc()):
        ?>
        <option value="<?= $k['id_kategori'] ?>" <?= isset($dataEdit) && $dataEdit['id_kategori']==$k['id_kategori'] ? 'selected' : '' ?>>
            <?= $k['nama_kategori'] ?>
        </option>
        <?php endwhile; ?>
    </select><br>

    <label>Supplier:</label>
    <select name="supplier">
        <?php 
        $sups = $supplier->tampil();
        while ($s = $sups->fetch_assoc()):
        ?>
        <option value="<?= $s['id_supplier'] ?>" <?= isset($dataEdit) && $dataEdit['id_supplier']==$s['id_supplier'] ? 'selected' : '' ?>>
            <?= $s['nama_supplier'] ?>
        </option>
        <?php endwhile; ?>
    </select><br>

    <button type="submit">Simpan</button>
</form>
