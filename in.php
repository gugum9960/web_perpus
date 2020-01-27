<?php
	require 'koneksi.php';
	
	$sql = "SELECT * FROM pengguna 
			WHERE username='".$_POST['username']."' AND 
			password='".$_POST['password']."'";
	
	$result = mysqli_query($con, $sql);
	
	$check = mysqli_num_rows($result);
	
	if($check) {
		session_start();
		
		$row = mysqli_fetch_assoc($result);
		
		$_SESSION['u'] = $row['username'];
		
		header('Location: index.php');
	}
	else{
		echo "<script>alert('Username atau Password anda salah!');window.location='log.php'</script>";
	}
?>