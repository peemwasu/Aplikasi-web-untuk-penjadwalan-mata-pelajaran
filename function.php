<?php 
// koneksikan dengan database
$koneksikan = mysqli_connect("localhost","root","","datamaster");

// Tambah Data Dosen
if(isset($_POST['tambahdatadosen'])){
    $namadosen = $_POST['namadosen'];
    $nidn      = $_POST['nidn'];
    $niy       = $_POST['niy'];

    $tambahdatadosen = mysqli_query($koneksikan, "INSERT into datadosen (namadosen, nidn, niy) values('$namadosen','$nidn','$niy')");
    if($tambahdatadosen){
        header('location:datadosen.php');
    } else {
        header('location:datadosen.php');
    }

};

// Menambah Data Mahasiswa
if(isset($_POST['tambahdatamahasiswa'])){
    $namamahasiswa = $_POST['namamahasiswa'];
    $nim           = $_POST['nim'];

    $tambahdatamahasiswa = mysqli_query($koneksikan,"INSERT into datamahasiswa (namamahasiswa, nim) values ('$namamahasiswa', '$nim')");
    if($tambahdatamahasiswa){
        header('location:datamahasiswa.php');
    } else {
        header('location:datamahasiswa.php');
    }

};



 ?>