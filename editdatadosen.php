<?php 
    require 'function.php';
    // Ambil parameter iddosen pada kolom tabel yang di klik menggunakan fungsi $_GET
    $id = $_GET['iddosen'];
    // ambil semuda data dari tabel datadosen, yang memiliki iddosen yang dimaksud / diklik sebelumnya
    $ambildata = mysqli_query($koneksikan, "SELECT * FROM datadosen WHERE iddosen='$id'");
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
        <title>Halaman Edit Data Dosen</title>
        <link href="css/styles3.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div class="container col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Edit Data Dosen
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="form-item">

                        <div class="form-group">
                            <label for="namadosen">Nama Dosen</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu namadosen -->
                            <input type="text" name="namadosen" value="<?php echo $data['namadosen'] ?>" class="form-control col-md-9" placeholder="Masukkan Nama Dosen  ">
                        </div>

                        <div class="form-group">
                            <label for="nidndosen">NIDN Dosen</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu nidn -->
                            <input type="text" name="nidn" value="<?php echo $data['nidn'] ?>" class="form-control col-md-9" placeholder="Masukkan NIDN Dosen  ">
                        </div>

                        <div class="form-group">
                            <label for="niy">NIY Dosen</label>
                            <!-- value digunakan untuk menampilkan isi dari tabel yang ada di dalam tabel dosen
                                sesuai dengan atributnya yaitu niy -->
                            <input type="text" name="niy" value="<?php echo $data['niy'] ?>" class="form-control col-md-9" placeholder="Masukkan NIY Dosen  ">
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
        $namadosen = $_POST['namadosen'];
        $nidn      = $_POST['nidn'];
        $niy       = $_POST['niy'];

        // Jalankan fungsi update pada tabel data dosen dengan mengubah setiap data pada
        // pada atribut tabelnya yaitu namadosen, nidn, dan niy
        // berdasarkan iddosen yang diambil sebelumnya
        mysqli_query($koneksikan, "UPDATE datadosen 
        SET namadosen='$namadosen', nidn='$nidn', niy='$niy'
        WHERE iddosen='$id'") or die(mysqli_error($koneksikan));

        echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang DiUpdate......</h5></div>";
        // Setelah data diupdate maka arahkan user ke halaman datadosen.php
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/kel10/datadosen.php'>";
    }
?>