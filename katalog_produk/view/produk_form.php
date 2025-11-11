<?php
// memanggil class clas s
require_once './class/Produk.php';
require_once './class/Kategori.php';
require_once './class/Supplier.php';

// membuat objek dari masing-masing class agar bisa digunakan 
$kategori = new Kategori();
$supplier = new Supplier();
$produk = new Produk();

// mengecek apakah form dikirim menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // jika terdapat 'id_produk' di form,berarti sedang mengedit produk
    if (isset($_POST['id_produk']) && $_POST['id_produk'] != '') {
        // memanggil fungsi ubah() untuk memperbarui data produk berdasarkan id
        $produk->ubah(
            $_POST['id_produk'], // id produk yang akan diubah
            $_POST['nama'],      // nama produk baru
            $_POST['harga'],     // harga produk baru
            $_POST['kategori'],  // id kategori yang dipilih
            $_POST['supplier']   // id supplier yang dipilih
        );
    } else {
        // jika tidak ada id, berarti menambahkan produk baru
        $produk->tambah(
            $_POST['nama'],      // nama produk baru
            $_POST['harga'],     // harga produk baru
            $_POST['kategori'],  // id kategori yang dipilih
            $_POST['supplier']   // id supplier yang dipilih
        );
    }

    // setelah menambah atau mengubah, kembali ke halaman daftar produk
    header('Location: index.php?page=produk');
    exit;
}

// variabel untuk menampung data produk yang akan diedit
$dataEdit = null;

// jika parameter 'id' ada di URL, artinya pengguna menekan tombol "edit"
if (isset($_GET['id'])) {
    // mengambil data produk berdasarkan id untuk ditampilkan di form edit
    $dataEdit = $produk->getById($_GET['id']);
}
?>

<!-- judul halaman -->
<h2><?= $dataEdit ? 'Edit Produk' : 'Tambah Produk' ?></h2>

<!-- form untuk tambah/edit produk -->
<form method="POST">
    <?php if ($dataEdit): ?>
        <!-- jika mode edit, tambah input tersembunyi untuk menyimpan id produk -->
        <input type="hidden" name="id_produk" value="<?= $dataEdit['id_produk'] ?>">
    <?php endif; ?>

    <!-- input nama produk -->
    <label>Nama Produk:</label>
    <input type="text" name="nama" value="<?= $dataEdit['nama_produk'] ?? '' ?>"><br>

    <!-- input harga produk -->
    <label>Harga:</label>
    <input type="number" name="harga" value="<?= $dataEdit['harga'] ?? '' ?>"><br>

    <!-- dropdown pilihan kategori -->
    <label>Kategori:</label>
    <select name="kategori">
        <?php 
        // mengambil seluruh data kategori ditampilkan di dropdown
        $kats = $kategori->tampil();
        while ($k = $kats->fetch_assoc()):
        ?>
        <!-- menandai kategori yang sedang digunakan -->
        <option value="<?= $k['id_kategori'] ?>" <?= isset($dataEdit) && $dataEdit['id_kategori']==$k['id_kategori'] ? 'selected' : '' ?>>
            <?= $k['nama_kategori'] ?>
        </option>
        <?php endwhile; ?>
    </select><br>

    <!-- dropdown pilihan supplier -->
    <label>Supplier:</label>
    <select name="supplier">
        <?php 
        // mengambil seluruh data supplier dari database untuk ditampilkan di dropdown
        $sups = $supplier->tampil();
        while ($s = $sups->fetch_assoc()):
        ?>
        <!-- menandai supplier yang sedang digunakan  -->
        <option value="<?= $s['id_supplier'] ?>" <?= isset($dataEdit) && $dataEdit['id_supplier']==$s['id_supplier'] ? 'selected' : '' ?>>
            <?= $s['nama_supplier'] ?>
        </option>
        <?php endwhile; ?>
    </select><br>

    <!-- tombol untuk menyimpan data -->
    <button type="submit">Simpan</button>
</form>
