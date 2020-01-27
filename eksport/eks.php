<?php
	require '../koneksi.php';
	
	if(isset($_POST["excel"]) and $_POST['h_sql']==NULL){
	$rslt = mysqli_query($con,"SELECT * FROM pengunjung");
	$datanya =array();
	$i=0;
	while($rec = mysqli_fetch_assoc($rslt)){
		//echo $rec['nama']." ".$rec['harga']."<br/>";
	    $datanya[$i]['id']=$rec['id'];
		$datanya[$i]['tanggal']=$rec['tanggal'];
		$datanya[$i]['nama']=$rec['nama'];
		$datanya[$i]['jenis_kelamin']=$rec['jenis_kelamin'];
		$datanya[$i]['no_hp']=$rec['no_hp'];
		$datanya[$i]['email']=$rec['email'];
		$datanya[$i]['profesi']=$rec['profesi'];
		$datanya[$i]['lembaga']=$rec['lembaga'];
		$datanya[$i]['alamat']=$rec['alamat'];
		$datanya[$i]['keperluan']=$rec['keperluan'];
		$datanya[$i]['keterangan']=$rec['keterangan'];
		$i++;
	}
		
	require "PHPExcel-1.8\Classes\PHPExcel.php";

	//membuat objek baru kelas PHPExcel
	$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Tanggal')
		->setCellValue('C1', 'Nama')
		->setCellValue('D1', 'Jenis Kelamin')
		->setCellValue('E1', 'No Handphone')
		->setCellValue('F1', 'Email')
		->setCellValue('G1', 'Profesi')
		->setCellValue('H1', 'Lembaga')
		->setCellValue('I1', 'Alamat')
		->setCellValue('J1', 'Keperluan')
		->setCellValue('K1', 'Keterangan');

	$nomor=1;
	$i=2; //counter bagi sheet xls teratas  yang 1 dipakai untuk header
	foreach($datanya as $perdata){
		$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue("A$i", $nomor)
	        ->setCellValue("B$i", $perdata['tanggal'])
	        ->setCellValue("C$i", $perdata['nama'])
	        ->setCellValue("D$i", $perdata['jenis_kelamin'])
	        ->setCellValue("E$i", $perdata['no_hp'])
	        ->setCellValue("F$i", $perdata['email'])
	        ->setCellValue("G$i", $perdata['profesi'])
	        ->setCellValue("H$i", $perdata['lembaga'])
	        ->setCellValue("I$i", $perdata['alamat'])
	        ->setCellValue("J$i", $perdata['keperluan'])
	        ->setCellValue("K$i", $perdata['keterangan']);
	    $i++;
	    $nomor++;
	}
	//echo "berhasil masukkan aksi";
	$objPHPExcel->getActiveSheet()->setTitle('Pengunjung');

	$objPHPExcel->setActiveSheetIndex(0);


	//membuat objek penulis
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('tabel/Laporan Pengunjung Perpustakaan.xlsx');
	//echo "<hr/>";
	//echo __FILE__;
	header("Location: tabel/Laporan Pengunjung Perpustakaan.xlsx");
	}
	else{
	$rslt = mysqli_query($con,$_POST['h_sql']);
	$datanya =array();
	$i=0;
	while($rec = mysqli_fetch_assoc($rslt)){
		//echo $rec['nama']." ".$rec['harga']."<br/>";
	    $datanya[$i]['id']=$rec['id'];
		$datanya[$i]['tanggal']=$rec['tanggal'];
		$datanya[$i]['nama']=$rec['nama'];
		$datanya[$i]['jenis_kelamin']=$rec['jenis_kelamin'];
		$datanya[$i]['no_hp']=$rec['no_hp'];
		$datanya[$i]['email']=$rec['email'];
		$datanya[$i]['profesi']=$rec['profesi'];
		$datanya[$i]['lembaga']=$rec['lembaga'];
		$datanya[$i]['alamat']=$rec['alamat'];
		$datanya[$i]['keperluan']=$rec['keperluan'];
		$datanya[$i]['keterangan']=$rec['keterangan'];
		$i++;
	}
		
	require "PHPExcel-1.8\Classes\PHPExcel.php";

	//membuat objek baru kelas PHPExcel
	$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Tanggal')
		->setCellValue('C1', 'Nama')
		->setCellValue('D1', 'Jenis Kelamin')
		->setCellValue('E1', 'No Handphone')
		->setCellValue('F1', 'Email')
		->setCellValue('G1', 'Profesi')
		->setCellValue('H1', 'Lembaga')
		->setCellValue('I1', 'Alamat')
		->setCellValue('J1', 'Keperluan')
		->setCellValue('K1', 'Keterangan');

	$nomor=1;
	$i=2; //counter bagi sheet xls teratas  yang 1 dipakai untuk header
	foreach($datanya as $perdata){
		$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue("A$i", $nomor)
	        ->setCellValue("B$i", $perdata['tanggal'])
	        ->setCellValue("C$i", $perdata['nama'])
	        ->setCellValue("D$i", $perdata['jenis_kelamin'])
	        ->setCellValue("E$i", $perdata['no_hp'])
	        ->setCellValue("F$i", $perdata['email'])
	        ->setCellValue("G$i", $perdata['profesi'])
	        ->setCellValue("H$i", $perdata['lembaga'])
	        ->setCellValue("I$i", $perdata['alamat'])
	        ->setCellValue("J$i", $perdata['keperluan'])
	        ->setCellValue("K$i", $perdata['keterangan']);
	    $i++;
	    $nomor++;
	}
	//echo "berhasil masukkan aksi";
	$objPHPExcel->getActiveSheet()->setTitle('Pengunjung');

	$objPHPExcel->setActiveSheetIndex(0);


	//membuat objek penulis
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('tabel/Laporan Pengunjung Perpustakaan.xlsx');
	//echo "<hr/>";
	//echo __FILE__;
	header("Location: tabel/Laporan Pengunjung Perpustakaan.xlsx");
	}
?>