<?php
    require 'function.php';
    // Ambil parameter iddosen pada kolom tabel yang di klik menggunakan fungsi $_GET
    $id = $_GET['iddosen'];
    // Kemudian ketika user menekan tombol hapus pada halaman datadosen.php maka
    // jalankan script mysql untuk menghapus data pada tabel mahasiswa berdasarkan iddosen
    // yang diambil sebelumnya
    $hapusdata = mysqli_query($koneksikan, "DELETE FROM datadosen WHERE iddosen='$id'");
    // setelah data terhapus user akan diarahkan ke halaman datadosen.php
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/kel10/datadosen.php'>";
?>