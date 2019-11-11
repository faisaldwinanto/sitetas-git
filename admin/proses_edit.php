<?php
    
    $id = $_POST['idnya'];
    $nama = $_POST['nama'];
    $uname = $_POST['un'];
    $pwd = $_POST['pwd'];
    $lvl = $_POST['stat'];


    $q = "UPDATE `pengguna` SET 
    `id_pengguna`='$id',`nama_pengguna`='$nama',`username`='$uname',`password`='$pwd',`status`='$lvl'
    WHERE id_pengguna = '$id'";

    include "../koneksi.php";
    mysqli_query($con,$q);
    header('location:home.php');
?>
