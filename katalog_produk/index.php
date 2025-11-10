<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'produk';

include './view/header.php';

switch ($page) {
    /* ===== PRODUK ===== */
    case 'produk':
        include './view/produk_list.php';
        break;
    case 'tambah_produk':
        include './view/produk_form.php';
        break;
    case 'edit_produk':
        include './view/produk_form.php';
        break;
    case 'hapus_produk':
        require_once './class/Produk.php';
        $produk = new Produk();
        $produk->hapus($_GET['id']);
        header('Location: index.php?page=produk');
        exit;

    /* ===== KATEGORI ===== */
    case 'kategori':
        include './view/kategori_list.php';
        break;
    case 'tambah_kategori':
        include './view/kategori_form.php';
        break;
    case 'edit_kategori':
        include './view/kategori_form.php';
        break;
    case 'hapus_kategori':
        require_once './class/Kategori.php';
        $kategori = new Kategori();
        $kategori->hapus($_GET['id']);
        header('Location: index.php?page=kategori');
        exit;

    /* ===== SUPPLIER ===== */
    case 'supplier':
        include './view/supplier_list.php';
        break;
    case 'tambah_supplier':
        include './view/supplier_form.php';
        break;
    case 'edit_supplier':
        include './view/supplier_form.php';
        break;
    case 'hapus_supplier':
        require_once './class/Supplier.php';
        $supplier = new Supplier();
        $supplier->hapus($_GET['id']);
        header('Location: index.php?page=supplier');
        exit;

    /* ===== DEFAULT ===== */
    default:
        echo "<h2>Halaman tidak ditemukan</h2>";
        break;
}

include './view/footer.php';
//cek aja ini dimana
?>

