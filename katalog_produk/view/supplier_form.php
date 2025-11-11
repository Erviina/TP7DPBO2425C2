<?php
// import kelas supplier
require_once './class/Supplier.php';

// bikin objek supplier
$supplier = new Supplier();

$dataEdit = null;

// cek apakah form dikirim pakai metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // kalau ada id_supplier, berarti user lagi ngedit data yang sudah ada
    if (!empty($_POST['id_supplier'])) {
        // jalankan fungsi ubah() untuk update data supplier berdasarkan id
        $supplier->ubah($_POST['id_supplier'], $_POST['nama'], $_POST['kontak']);

    // kalau gak ada id_supplier, berarti user nambah data baru
    } else {
        // jalankan fungsi tambah() untuk menambah supplier baru ke database
        $supplier->tambah($_POST['nama'], $_POST['kontak']);
    }

    // setelah selesai, arahkan balik ke halaman daftar supplier
    header('Location: index.php?page=supplier');
    exit;
}

// Kalau ada parameter id (misal ?page=edit_supplier&id=2)
if (isset($_GET['id'])) {
    // ambil data supplier berdasarkan id nya buat diisi ke form edit
    $dataEdit = $supplier->getById($_GET['id']);
}
?>

<!-- judul halaman -->
<h2><?= $dataEdit ? 'Edit Supplier' : 'Tambah Supplier' ?></h2>

<!-- form untuk input data supplier -->
<form method="POST">
    <?php if ($dataEdit): ?>
        <!-- input hidden buat simpan id supplier (hanya muncul saat mode edit) -->
        <input type="hidden" name="id_supplier" value="<?= $dataEdit['id_supplier'] ?>">
    <?php endif; ?>

    <!-- input nama supplier -->
    <label>Nama Supplier:</label>
    <input type="text" name="nama" value="<?= $dataEdit['nama_supplier'] ?? '' ?>"><br>

    <!-- input kontak supplier (nomor/telepon/email) -->
    <label>Kontak:</label>
    <input type="text" name="kontak" value="<?= $dataEdit['kontak'] ?? '' ?>"><br>

    <!-- tombol untuk menyimpan data -->
    <button type="submit">Simpan</button>
</form>
