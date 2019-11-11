<?php
	require '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');
	$id_kepemilikan = $_POST['id_kepemilikan'];
	$nilai_suhu = $_POST['rand_val1'];
	$nilai_kelembaban = $_POST['rand_val2'];

	$sql = "SELECT * FROM `ambangsuhu` ORDER BY `ambangsuhu`.`id_ambangS` ASC";
	$sql2 = "SELECT * FROM `ambangkelembaban` ORDER BY `ambangkelembaban`.`id_ambangK` ASC";
	$result = mysqli_query($con, $sql);
	$result2 = mysqli_query($con, $sql2);
	$status = '';
	$status2 = '';



	while($row = mysqli_fetch_array($result)) {
		if (eval('return '.$nilai_suhu.$row['suhu'].';'))
			$status = $row['status'];

	}

	while($row2 = mysqli_fetch_array($result2)) {
		if (eval('return '.$nilai_kelembaban.$row2['kelembaban'].';'))
			$status2 = $row2['status'];

	}



	/*	$sql = "INSERT INTO `nilai`(`id_alat`, `nilai_suhu`,`nilai_kelembaban`, `jam`, `tanggal`, `status_suhu`,`status_kelembaban`) 
	VALUES ('".$id_alat."','".$nilai_suhu."','".$nilai_kelembaban."','".date('H:i:s')."','".date('Y-m-d')."','".$status."','".$status2."')";*/
	
	$sql = "INSERT INTO `nilai`( `nilai_suhu`, `nilai_kelembaban`, `jam`, `tanggal`, `status_suhu`, `status_kelembaban`, `id_kepemilikan`) 
	VALUES ('".$nilai_suhu."','".$nilai_kelembaban."','".date('H:i:s')."','".date('Y-m-d')."','".$status."','".$status2."','".$id_kepemilikan."')";

	$response = mysqli_query($con, $sql);

	echo json_encode($response);
?>