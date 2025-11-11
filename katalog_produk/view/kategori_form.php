<?php
// mengimpor file class Kategori
require_once './class/Kategori.php';

// membuat objek baru dari class Kategori untuk melakukan operasi CRUD
$kategori = new Kategori();

// mengecek apakah form dikirim menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // jika terdapat id_kategori di POST, berarti user sedang mengedit data
    if (!empty($_POST['id_kategori'])) {
        // jalankan fungsi ubah() untuk memperbarui data kategori di database
        $kategori->ubah($_POST['id_kategori'], $_POST['nama']);
    } else {
        // jika tidak ada id_kategori, berarti user sedang menambah data baru
        // jalankan fungsi tambah() untuk menambahkan data kategori baru
        $kategori->tambah($_POST['nama']);
    }

    // setelah proses simpan (tambah/ubah), arahkan kembali ke halaman daftar kategori
    header('Location: index.php?page=kategori');
    exit; 
}

// variabel untuk menampung data kategori yang akan diedit
$dataEdit = null;

if (isset($_GET['id'])) {
    // ambil data kategori berdasarkan id yang dikirim
    $dataEdit = $kategori->getById($_GET['id']);
}
?>

<!-- menampilkan judul halaman sesuai kondisi  -->
<h2><?= $dataEdit ? 'Edit Kategori' : 'Tambah Kategori' ?></h2>

<!-- form input untuk tambah atau edit kategori -->
<form method="POST">
    <?php if ($dataEdit): ?>
        <!-- input tersembunyi  -->
        <input type="hidden" name="id_kategori" value="<?= $dataEdit['id_kategori'] ?>">
    <?php endif; ?>

    <!-- input untuk nama kategori -->
    <label>Nama Kategori:</label>
    <!-- jika sedang edit, value akan otomatis terisi -->
    <input type="text" name="nama" value="<?= $dataEdit['nama_kategori'] ?? '' ?>">

    <!-- tombol untuk menyimpan data -->
    <button type="submit">Simpan</button>
</form>
