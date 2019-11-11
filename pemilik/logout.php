<?php
    session_start();

	$_SESSION["ua"] = '';
	$_SESSION["nama"] = '';
	$_SESSION["id_alat"] = '';
	$_SESSION["status"] = '';
    unset($_SESSION['ua'],$_SESSION['nama'],$_SESSION['id_alat'],$_SESSION['status']);
    
    session_unset();
    session_destroy();

    header('location:../index.php');
?>