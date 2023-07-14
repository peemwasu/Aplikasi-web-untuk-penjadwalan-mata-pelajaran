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

if(isset($_POST['tambahdatamatkul'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $SKS = $_POST['SKS'];
    $semester = $_POST['semester'];

    $tambahdatamatkul = mysqli_query($koneksikan,"INSERT into datamatkul (kode, nama, SKS, semester) values ('$kode', '$nama', '$SKS', '$semester')");
    if($tambahdatamatkul){
        header('location:datamatkul.php');
    } else {
        header('location:datamatkul.php');
    }

};
//Edit Data Mahasiswa
/*if(isset($_POST['editdatamahasiswa'])){
    $idmahasiswa   = $_POST['idmahasiswa'];
    $namamahasiswa = $_POST['namamahasiswa'];
    $nim           = $_POST['nim'];

    $editdatamahasiswa = mysqli_query($koneksikan,"UPDATE datamahasiswa SET namamahasiswa='$namamahasiswa', nim='$nim' WHERE idmahasiswa='$idmahasiswa'");
    if($editdatamahasiswa){
        header('location:datamahasiswa.php');
    } else {
        header('location:datamahasiswa.php');
    }

};
*/
if(isset($_POST['change_pass'])){
    $oldPass = md5($_POST['oldPass']);
    $newPass_1 = md5($_POST['newPass_1']);
    $newPass_2 = md5($_POST['newPass_2']);
    $oldPassDB = $_SESSION['password'];
    $username = $_SESSION['username'];
    if($newPass_1 != $newPass_2){
        $_SESSION['error'] = "The two password do not match";
    }
    if($oldPass != $oldPassDB){
        $_SESSION['error'] = "Old password is incorrect";
    }

    if(!isset($_SESSSION['error'])){
        $changePassQuery = "UPDATE `tb_user` SET `password` = '$newPass_1' WHERE `username` = '$username'";
        mysqli_query($db, $changePassQuery);
    }
}

 ?>