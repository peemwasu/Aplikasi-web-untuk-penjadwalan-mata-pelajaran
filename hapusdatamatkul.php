<?php
    require 'function.php';
    // Ambil parameter idmahasiswa pada kolom tabel yang di klik menggunakan fungsi $_GET
    $id = $_GET['kode'];
    // Kemudian ketika user menekan tombol hapus pada halaman datamahasiswa.php maka
    // jalankan script mysql untuk menghapus data pada tabel mahasiswa berdasarkan idmahasiswa
    // yang diambil sebelumnya
    $hapusdata = mysqli_query($koneksikan, "DELETE FROM datamatkul WHERE kode='$id'");
    // setelah data terhapus user akan diarahkan ke halaman datamahasiswa.php
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/kel10/datamatkul.php'>";
?>