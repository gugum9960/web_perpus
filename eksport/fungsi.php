<?php require '../koneksi.php';
//fungsi pertama single-sheet
if(isset($_POST["xl_peng"])){
	$rslt = mysqli_query($con,"SELECT * FROM pengamatan");
	$datanya =array();
	$i=0;
	while($rec = mysqli_fetch_assoc($rslt)){
		//echo $rec['nama']." ".$rec['harga']."<br/>";
	    $datanya[$i]['id_pengamatan']=$rec['id_pengamatan'];
		$datanya[$i]['nilai_suhu']=$rec['nilai_suhu'];
		$datanya[$i]['nilai_kelembapan']=$rec['nilai_kelembapan'];
		$datanya[$i]['waktu']=$rec['waktu'];
		$i++;
		}
		
	require "PHPExcel-1.8\Classes\PHPExcel.php";

	//membuat objek baru kelas PHPExcel
	$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Id Pengamatan')
		->setCellValue('B1', 'Nilai Suhu')
		->setCellValue('C1', 'Nilai Kelembapan')
		->setCellValue('D1', 'Waktu');


	$i=2; //counter bagi sheet xls teratas  yang 1 dipakai untuk header
	foreach($datanya as $perdata){
		$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue("A$i", $perdata['id_pengamatan'])
	        ->setCellValue("B$i", $perdata['nilai_suhu'])
	        ->setCellValue("C$i", $perdata['nilai_kelembapan'])
	        ->setCellValue("D$i", $perdata['waktu']);
	    $i++;
	}
	//echo "berhasil masukkan aksi";
	$objPHPExcel->getActiveSheet()->setTitle('Pengamatan');

	$objPHPExcel->setActiveSheetIndex(0);


	//membuat objek penulis
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('tabel/pengamatan(singlesheet).xlsx');
	//echo "<hr/>";
	//echo __FILE__;
}

//fungsi ke 2 multisheet
if(isset($_POST["submit2"])){
	$rslt = mysqli_query($con,"SELECT * FROM pengamatan");
	$datanya =array();
	$i=0;
	while($rec = mysqli_fetch_assoc($rslt)){
		//echo $rec['nama']." ".$rec['harga']."<br/>";
	    $datanya[$i]['id_pengamatan']=$rec['id_pengamatan'];
		$datanya[$i]['nilai_suhu']=$rec['nilai_suhu'];
		$datanya[$i]['nilai_kelembapan']=$rec['nilai_kelembapan'];
		$datanya[$i]['waktu']=$rec['waktu'];
		$i++;
		}	
	require "PHPExcel-1.8\Classes\PHPExcel.php";
	//membuat objek baru kelas PHPExcel
	$objPHPExcel = new PHPExcel();

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Id Pengamatan')
		->setCellValue('B1', 'Nilai Suhu')
		->setCellValue('C1', 'Waktu');
		$objPHPExcel->getActiveSheet()->setTitle('Suhu');

		$objPHPExcel->createSheet(1);
		$objPHPExcel->setActiveSheetIndex(1)
		->setCellValue('A1', 'Id Pengamatan')
		->setCellValue('B1', 'Nilai Kelembapan')
		->setCellValue('C1', 'Waktu');
		$objPHPExcel->getActiveSheet()->setTitle('Kelembapan');
	$i=2; //counter bagi sheet xls teratas  yang 1 dipakai untuk header
	foreach($datanya as $perdata){
		$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue("A$i", $perdata['id_pengamatan'])
	        ->setCellValue("B$i", $perdata['nilai_suhu'])
	        ->setCellValue("C$i", $perdata['waktu']);
		$objPHPExcel->setActiveSheetIndex(1)
	        ->setCellValue("A$i", $perdata['id_pengamatan'])
	        ->setCellValue("B$i", $perdata['nilai_kelembapan'])
	        ->setCellValue("C$i", $perdata['waktu']);
		$i++;		
	}
	$objPHPExcel->setActiveSheetIndex(0);
	//membuat objek penulis
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('tabel/pengamatan(multisheet).xlsx');
}
	//echo "<hr/> file disimpan di ";
	//echo __FILE__;
	//echo "<script> alert(coba); </script>";



//https://www.mynotescode.com/cara-membuat-import-data-excel-dengan-php-dan-mysql/
//eksport ke database
if(isset($_POST['submit3'])){ // Jika user mengklik tombol Import
  //$file = 'aksi.xslx';
	$file = $_POST["unggah"];
	//echo $file;

	if (!file_exists('tabel/'.$file)) {
		exit("File xlsnya ora ono");
	}
  // Load librari PHPExcel nya
  require_once "PHPExcel-1.8\Classes\PHPExcel.php";
  
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tabel/'.$file); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id_user = $row['A']; // Ambil data id user
		$username = $row['B']; // Ambil data username
		$password = $row['C']; // Ambil data pass
		$nama_lengkap = $row['D']; // Ambil nama
		$email = $row['E']; // Ambil data email
		
		// Cek jika semua data tidak diisi
		if(empty($id_user) && empty($username) && empty($password) && empty($nama_lengkap) && empty($email))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Tambahkan value yang akan di insert ke variabel $query
			$query = "INSERT INTO pengguna VALUES ('$id_user','$username','$password','$nama_lengkap','$email')";
			mysqli_query($con, $query);
		}
		$numrow++; // Tambah 1 setiap kali looping
	}
	
	// Kita hilangkan tanda koma di akhir query
	// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
	// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
	//$query = substr($query, 0, strlen($query) - 1).";";
	// Eksekusi $query
	
  
}

?>