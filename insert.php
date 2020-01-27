<?php
	require 'koneksi.php';

	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("Y-m-d H:i:s");
	
	$sql = "INSERT INTO `perpus`.`pengunjung` (`tanggal`, `nama`, `jenis_kelamin`, `no_hp`, `email`, `profesi`, `lembaga`, `alamat`, `keperluan`, `keterangan`) VALUES ('$tanggal','".$_POST['nama']."','".$_POST['jenis_kelamin']."','".$_POST['no_hp']."','".$_POST['email']."','".$_POST['profesi']."','".$_POST['lembaga']."','".$_POST['alamat']."','".$_POST['keperluan']."','".$_POST['keterangan']."')";
		
	$result = mysqli_query($con, $sql);
	
	if($result){
		header('location:index.php');
	}
	else
		echo "Gagal Order";
		
		/*
		INSERT INTO `db_order`.`table_order` (`id_order`, `nama_pem`, `jenis_kelamin`, `nama_barang`, `alamat`, `kota`, `kode_pos`, `no_telp`) VALUES (NULL, 'Gumelar Eka Bagja', 'Laki-Laki', 'J3D116058', 'Bogor', 'Bogor', '16710', '089621829373');
		*/
?>

