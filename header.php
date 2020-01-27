<?php
	//error_reporting(0);
	require 'koneksi.php';
	session_start();
?>
<html>
	<head>
		<title>Perpustakaan Puslitbangbun</title>
		<link rel="shortcut icon" href="img/logo-perpus.png"/>
		<link rel="stylesheet" href="store.css?v=">
		<script type="text/javascript" src="store.js?v="></script>
		<script src="Chart.bundle.js"></script>

	</head>
	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()',10)">
		<div class="container">
			<div id="head">
				<img class="banner" src="img/banner-perpus2.png">
				<div id="clock"></div>
					<div id="tgl">
					<?php
					$hari = date('l');
					/*$new = date('l, F d, Y', strtotime($Today));*/
					if ($hari=="Sunday") {
					 echo "Minggu";
					}elseif ($hari=="Monday") {
					 echo "Senin";
					}elseif ($hari=="Tuesday") {
					 echo "Selasa";
					}elseif ($hari=="Wednesday") {
					 echo "Rabu";
					}elseif ($hari=="Thursday") {
					 echo("Kamis");
					}elseif ($hari=="Friday") {
					 echo "Jum'at";
					}elseif ($hari=="Saturday") {
					 echo "Sabtu";
					}
					?>,

					<?php
					$tgl =date('d');
					echo $tgl;
					$bulan =date('F');
					if ($bulan=="January") {
					 echo " Januari ";
					}elseif ($bulan=="February") {
					 echo " Februari ";
					}elseif ($bulan=="March") {
					 echo " Maret ";
					}elseif ($bulan=="April") {
					 echo " April ";
					}elseif ($bulan=="May") {
					 echo " Mei ";
					}elseif ($bulan=="June") {
					 echo " Juni ";
					}elseif ($bulan=="July") {
					 echo " Juli ";
					}elseif ($bulan=="August") {
					 echo " Agustus ";
					}elseif ($bulan=="September") {
					 echo " September ";
					}elseif ($bulan=="October") {
					 echo " Oktober ";
					}elseif ($bulan=="November") {
					 echo " November ";
					}elseif ($bulan=="December") {
					 echo " Desember ";
					}
					$tahun=date('Y');
					echo $tahun;
					?>
					</div>
				<div class="bawah">
					<ul id="list">
						<li><a href="index.php">Beranda</a></li>
						<?php if(! empty($_SESSION['u'])) { ?>
						<li><a href="table_order.php">Tabel</a></li>
						<li><a href="chart.php">Grafik</a></li>
						<?php }?>
						<?php if(empty($_SESSION['u'])) { ?>
						<li><a href="log.php"">Masuk</a></li>
						<?php } else {?>
						<li><a href="out.php"">Keluar</a></li>
						<?php }?>
					<ul>
				</div>
			</div>
			<div id="body">