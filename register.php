<?php 
    require 'function.php';
// tambah data baru ke dalam database
    if(isset($_POST['buatakun'])){
    // Yang dimasukkan ke dalam tabel login hanya 2 atribut yaitu email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];
    // konfirmasi password hanya digunakan untuk pengecekkan kesamaan inputan password
    $konfirmasipassword = $_POST['konfirmasipassword'];
        if($password!==$konfirmasipassword){
            // Jika password yang diisikan tidak sama dengan konfirmasi password
            // maka jalankan script alert untuk memberitahu password yang diisikan tidak sama
            // dan data gagal disimpan
            echo "<script type='text/javascript'> alert('Password Yang Anda Masukkan Tidak Sama') </script>";
            echo "<script type='text/javascript'> alert('Data Gagal Dismpan') </script>";
        } else if($password===$konfirmasipassword){
            // Jika password yang dimasukkan di kolom pertama sama dengan password
            // yang dimasukkan di kolom kedua maka simpan data ke dalam tabel login 
            $mysqli = "INSERT INTO login (email, password) VALUES ('$email','$password')";
            $hasil = mysqli_query($koneksikan, $mysqli);
            sleep(2);
            header("location: login.php");
        }
        mysqli_close($koneksikan);
    };

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Daftar Akun</title>
        <link href="css/styles3.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun Baru</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-row">
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Masukkan Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Cek Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" name="konfirmasipassword" type="password" placeholder="Cek Password Anda" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" name="buatakun">Buat Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Sudah Punya Akun? Masuk ke Halaman Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
