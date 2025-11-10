## Tema Web ##


Website ini dibuat dengan tujuan untuk mengelola data produk, kategori, dan supplier dalam satu sistem yang terhubung.
Secara sederhana, sistem ini seperti mini manajemen toko di mana kita bisa menambahkan, melihat, mengubah, dan menghapus data-data tersebut dengan mudah.
Melalui website ini, pengguna bisa:
- Menambah data produk baru beserta harga, kategori, dan supplier-nya.
- Melihat daftar produk yang sudah ada.
- Mengedit atau menghapus data jika dibutuhkan.
- Mengelola data kategori dan supplier secara terpisah.

Website ini dibangun menggunakan PHP dan MySQL, dan semua proses pengambilan serta penyimpanan data dilakukan melalui prepared statement agar lebih aman dari SQL Injection.

## Struktur Database ##

![ERD Katalog Produk](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/ERD.png?raw=true)


Database di project ini terdiri dari tiga tabel utama, yaitu produk, kategori, dan supplier. Setiap tabel punya fungsi masing-masing dan saling terhubung lewat foreign key.
1. Tabel kategori
   berisi :
   - id_kategori (primary key, auto increment)
   - nama_kategori
     
2. Tabel supplier
   Tabel ini menyimpan data para pemasok barang.
   berisi dari:
   - id_supplier (Primary Key)
   - nama_supplier
   - kontak (misalnya nomor telepon atau email)

3. Tabel produk
   tabel ini yang jadi tabel utama karena berisi data semua produk.
   Di sini terdapat kolom:
   - id_produk (Primary Key)
   - nama_produk
   - harga
   - id_kategori (Foreign Key → kategori.id_kategori)
   - id_supplier (Foreign Key → supplier.id_supplier)

Jadi, setiap produk akan terhubung ke satu kategori dan satu supplier.

## Penjelasan Flow Program ##

Semua logika utama dijalankan melalui file index.php, sedangkan operasi data dilakukan di file kelas (class) seperti Produk.php, Kategori.php, dan Supplier.php

1. index.php
   file ini menjadi pengendali utama web
   - mengimpor file class: Produk.php, Kategori.php, Supplier.php
   - membuat objek untuk masing-masing entitas.
   - membaca parameter $_GET['page'] untuk menentukan halaman mana yang akan ditampilkan.
     Dibagian atas halaman ada tombol : produk | katalog| supplier
     Setiap tombol merupakan link ke ?page=produk, ?page=kategori, atau ?page=supplier

2. file Database
   File ini bertugas untuk mengatur koneksi ke database MySQL. Dengan adanya file ini, setiap kelas (produk, kategori, supplier) tinggal memanggil koneksi tanpa perlu menulis ulang kode koneksi. Tujuannya supaya lebih rapi dan terstruktur.

3. class produk, kategori, dan supplier
   Setiap entitas punya kelasnya masing-masing yang berisi fungsi CRUD:
   - tambah() untuk menambahkan data baru
   - tampil() untuk menampilkan data
   - ubah() untuk mengedit data
   - hapus() untuk menghapus data

4. Halaman Tampilan View
   Tiap bagian (produk, kategori, supplier) punya file tampilan tersendiri.
   Tampilan ini berupa tabel yang berisi data dari database, lengkap dengan tombol:
   - Tambah, membuka form input data baru
   - Edit, mengubah data
   - Hapus, menghapus data
   Tampilannya sederhana tapi cukup jelas dan mudah digunakan.
   
## Dokumentasi ##

Tambah produk

![Tambah Katalog Produk](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/tambahProduk.gif?raw=true)


Edit/update produk

![Edit Katalog Produk](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/editProduk.gif?raw=true)


Delete produk

![Hapus Katalog Produk](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/hapusProduk.gif?raw=true)


Tambah Kategori

![Tambah Kategori](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/tambahKategori.gif?raw=true)


Edit kategori

![Edit kategori](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/editKategore.gif?raw=true)


Hapus Kategori

![Hapus kategori](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/hapusKategori.gif?raw=true)


Tambah supplier

![tambah supplier](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/tambahSupplier.gif?raw=true)


Edit Supplier

![Edit supplier](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/editSupplier.gif?raw=true)


Hapus Supplier

![Hapus Supplier](https://github.com/Erviina/TP7DPBO2425C2/blob/main/dokumentasi/hapusSupplier.gif?raw=true)

   
