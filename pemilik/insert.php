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

	$sql = "SELECT kepemilikan.id_kepemilikan, pengguna.nama_pengguna, alat.nama_alat, nilai.nilai_suhu, nilai.nilai_kelembaban, nilai.jam,nilai.tanggal,nilai.status_suhu,nilai.status_kelembaban 
	FROM nilai JOIN kepemilikan ON kepemilikan.id_kepemilikan = nilai.id_kepemilikan JOIN pengguna ON pengguna.id_pengguna = kepemilikan.id_pengguna JOIN alat ON alat.id_alat = kepemilikan.id_alat";
	$response2 = mysqli_query($con,$sql);

	//echo json_encode($response);

	$riwayat = '<table border="1" cellspacing="0" id="Tabel" style="width:100%" class="table table-striped table-bordered">
                        <tr align="center" style="font-weight: bold">	
                            <th>No</th>
                            <th>Id Kepemilikan</th>
							<th>Nama Pengguna</th>
							<th>Nama Alat</th>
                            <th>Nilai Suhu</th>
							<th>Nilai Kelembaban</th>
							<th>Jam</th>
							<th>Tanggal</th>
                            <th>Status Suhu</th>
                            <th>Status Kelembaban </th>
                        </tr>';

				$i = 1;
	while ($row = mysqli_fetch_assoc($response2)) {

		$riwayat .=  '<tr>
                            <td>'.($i++).'</td>
							<td>'.$row['id_kepemilikan'].'</td>
							<td>'.$row['nama_pengguna'].'</td>
							<td>'.$row['nama_alat'].'</td>
                            <td>'.$row['nilai_suhu'].'</td>
                            <td>'.$row['nilai_kelembaban'].'</td>
                            <td>'.$row['jam'].'</td>
                            <td>'.$row['tanggal'].'</td>
                            <td>'.$row['status_suhu'].'</td>
                            <td>'.$row['status_kelembaban'].'</td>
                        </tr>';
		}
		if(!mysqli_num_rows($response2)){
			$riwayat .= '<tr>
							<td colspan ="10">datakosong</td>
						</tr>';
		}

		$riwayat.='</table>';


	$response2 = array('riwayat'=>$riwayat);

	echo json_encode($riwayat);
?>