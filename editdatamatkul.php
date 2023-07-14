<?php 
    require 'function.php';
    // Ambil parameter iddosen pada kolom tabel yang di klik menggunakan fungsi $_GET
    $id = $_GET['kode'];
    // ambil semuda data dari tabel datadosen, yang memiliki iddosen yang dimaksud / diklik sebelumnya
    $ambildata = mysqli_query($koneksikan, "SELECT * FROM datamatkul WHERE kode='$id'");
    $data=mysqli_fetch_array($ambildata);

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Edit Data Matkul</title>
        <link href="css/styles3.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div class="container col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Edit Data Matkul
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="form-item">

                        <div class="form-group">
                            <label for="nama">Nama Matkul</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu namadosen -->
                            <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control col-md-9" placeholder="Masukkan Nama Matkul ">
                        </div>

                        <div class="form-group">
                            <label for="SKS">SKS</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu nidn -->
                            <input type="text" name="SKS" value="<?php echo $data['SKS'] ?>" class="form-control col-md-9" placeholder="Masukkan SKS ">
                        </div>

                        <div class="form-group">
                            <label for="niy">Semester</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu niy -->
                            <input type="text" name="semester" value="<?php echo $data['semester'] ?>" class="form-control col-md-9" placeholder="Masukkan semester  ">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                        <button type="reset" class="btn btn-danger">BATAL</button>

                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>

<?php

    // Jika user menekan tombol simpan maka jalankan fungsi mysql di bawah ini
    if(isset($_POST['simpan']))
    {
        $nama = $_POST['nama'];
        $SKS      = $_POST['SKS'];
        $semester       = $_POST['semester'];

        // Jalankan fungsi update pada tabel data matkul dengan mengubah setiap data pada
        // pada atribut tabelnya yaitu nama, SKS, semester
        // berdasarkan iddosen yang diambil sebelumnya
        mysqli_query($koneksikan, "UPDATE datamatkul 
        SET nama='$nama', SKS='$SKS', semester='$semester'
        WHERE kode='$id'") or die(mysqli_error($koneksikan));

        echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang DiUpdate......</h5></div>";
        // Setelah data diupdate maka arahkan user ke halaman datadosen.php
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/kel10/datadosen.php'>";
    }
?>