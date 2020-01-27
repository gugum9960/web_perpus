<?php
$month = array(
			'Jan','Feb','Mar','Apr','Mei','Jun',
			'Jul','Agu','Sep','Okt','Nop','Des'
		);

$con = mysqli_connect('localhost', 'root', '', 'db_warkop');
$sql = "SELECT MONTH(tanggal) AS bulan, SUM(jumlah * harga) AS pendapatan FROM transaksi GROUP BY MONTH(tanggal)";

$result = mysqli_query($con,$sql);

$data = array();

	while ($row = mysqli_fetch_assoc($result)) {
		array_push($data, 
			array(
				'label' => $row['bulan'],
				'value' => $row['pendapatan']
			)
		);
	}

	$chart = array(
			
			);

	echo json_encode($data);
?>