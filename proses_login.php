<?php
session_start();

include "koneksi.php";

$username = $_POST['uname'];
$password = $_POST['pwd'];
/*$q = "SELECT * FROM pengguna WHERE username = '" . $username . "'
    AND password ='" . md5($password) . "'";
*/
$q = "SELECT * FROM pengguna 
LEFT JOIN kepemilikan ON pengguna.id_pengguna = kepemilikan.id_pengguna
WHERE username = '" . $username . "'
AND password ='" . md5($password) . "'
";



$login = mysqli_query($con, $q);
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['status'] == "Admin") {
        $_SESSION['ua'] = $_POST['uname']; 
        $_SESSION['nama'] = $data['nama_pengguna'];
        $_SESSION['id_alat'] = $data['id_alat'];
        $_SESSION['status'] = $data['status'];
        echo "Anda Berhasil Login!";
        echo "<meta http-equiv='refresh' content='2; url=admin/home.php'>";
        //header('location:admin/home.php');
    } else if ($data['status'] == "Peternak") {
        $_SESSION['ua'] = $_POST['uname'];
        $_SESSION['nama'] = $data['nama_pengguna'];
        $_SESSION['id_alat'] = $data['id_alat'];
        $_SESSION['status'] = $data['status'];
        echo "Anda Berhasil Login!";
        echo "<meta http-equiv='refresh' content='2; url=peternak/home.php'>";
        //header('location:peternak/home.php');
        
    } else if ($data['status'] == "Pemilik") {
        $_SESSION['ua'] = $_POST['uname'];
        $_SESSION['nama'] = $data['nama_pengguna'];
        $_SESSION['id_alat'] = $data['id_alat'];
        $_SESSION['status'] = $data['status'];
        echo "Anda Berhasil Login!";
        echo "<meta http-equiv='refresh' content='2; url=pemilik/home.php'>";
        //header('location:pemilik/home.php');
        
    } else {
        echo "Anda Gagal Login!";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
        //header('location:login.php');
    }
} else {
    echo "Anda Gagal Login!";
    echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    //header('location:login.php');
}

