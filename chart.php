<?php 
	require 'header.php';
// PERBULAN
	if(isset($_POST['tahun']) and $_POST['tahun']!=NULL){
		$sql_bulan = "SELECT IF(month(tanggal)='01','Januari',IF(month(tanggal)='02','Februari',IF(month(tanggal)='03','Maret',IF(month(tanggal)='04','April',IF(month(tanggal)='05','Mei',IF(month(tanggal)='06','Juni',IF(month(tanggal)='07','Juli',IF(month(tanggal)='08','Agustus',IF(month(tanggal)='09','September',IF(month(tanggal)='10','Oktober',IF(month(tanggal)='11','November',IF(month(tanggal)='12','Desember','bukan bulan')))))))))))) as tanggal FROM `pengunjung` WHERE year(tanggal)='".$_POST['tahun']."' and month(tanggal) between '".$_POST['bln1']."' and '".$_POST['bln2']."' GROUP by month(tanggal)";
		$result_bulan = mysqli_query($con, $sql_bulan);
		$sql_cbulan = "SELECT COUNT(tanggal) as tanggal FROM `pengunjung` WHERE year(tanggal)='".$_POST['tahun']."' and month(tanggal) between '".$_POST['bln1']."' and '".$_POST['bln2']."' GROUP by month(tanggal)";
		$result_cbulan = mysqli_query($con, $sql_cbulan);
	}
	else{
		$sql_bulan = "SELECT IF(month(tanggal)='01','Januari',IF(month(tanggal)='02','Februari',IF(month(tanggal)='03','Maret',IF(month(tanggal)='04','April',IF(month(tanggal)='05','Mei',IF(month(tanggal)='06','Juni',IF(month(tanggal)='07','Juli',IF(month(tanggal)='08','Agustus',IF(month(tanggal)='09','September',IF(month(tanggal)='10','Oktober',IF(month(tanggal)='11','November',IF(month(tanggal)='12','Desember','bukan bulan')))))))))))) as tanggal FROM `pengunjung` WHERE year(tanggal)='".date('Y')."' GROUP by month(tanggal)";
		$result_bulan = mysqli_query($con, $sql_bulan);
		$sql_cbulan = "SELECT COUNT(tanggal) as tanggal FROM `pengunjung` WHERE year(tanggal)='".date('Y')."' GROUP by month(tanggal)";
		$result_cbulan = mysqli_query($con, $sql_cbulan);
	
	}
?>
			<b><center><div id="TLap">GRAFIK PENGUNJUNG PERPUSTAKAAN</div></center></b>
			<br> 
			<form method="post">
				<div style="font-size: 25px;">
					<center><b>PERBULAN</b></center>
				</div>
				<table>
					<tr>
						<td>
							<select name="tahun">
				                <option value="">--Pilih Tahun--</option>
				                <?php
				                $thn_skr = date('Y');
				                for ($x = $thn_skr; $x >= 2010; $x--) {
				                ?>
				                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
				                <?php
				                }
				                ?>
				            </select>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td>
							<select name="bln1">
								<option value="">--Pilih Bulan--</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</td>
						<td>
							<select name="bln2">
								<option value="">--Pilih Bulan--</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</td>
						<td><input id="btn_cari" type="submit" value="CARI"></td>
					</tr>
				</table>
				<br>
				<div id="center_tahun">
				<center>
					<?php 
						if (isset($_POST['tahun']) and $_POST['tahun']!=NULL) {
							if ($_POST['bln1']=='01') {
								$_POST['bln1']='Januari';
							}
							if ($_POST['bln1']=='02') {
								$_POST['bln1']='Februari';
							}
							if ($_POST['bln1']=='03') {
								$_POST['bln1']='Maret';
							}
							if ($_POST['bln1']=='04') {
								$_POST['bln1']='April';
							}
							if ($_POST['bln1']=='05') {
								$_POST['bln1']='Mei';
							}
							if ($_POST['bln1']=='06') {
								$_POST['bln1']='Juni';
							}
							if ($_POST['bln1']=='07') {
								$_POST['bln1']='Juli';
							}
							if ($_POST['bln1']=='08') {
								$_POST['bln1']='Agustus';
							}
							if ($_POST['bln1']=='09') {
								$_POST['bln1']='September';
							}
							if ($_POST['bln1']=='10') {
								$_POST['bln1']='Oktober';
							}
							if ($_POST['bln1']=='11') {
								$_POST['bln1']='November';
							}
							if ($_POST['bln1']=='12') {
								$_POST['bln1']='Desember';
							}
							//bln2
							if ($_POST['bln2']=='01') {
								$_POST['bln2']='Januari';
							}
							if ($_POST['bln2']=='02') {
								$_POST['bln2']='Februari';
							}
							if ($_POST['bln2']=='03') {
								$_POST['bln2']='Maret';
							}
							if ($_POST['bln2']=='04') {
								$_POST['bln2']='April';
							}
							if ($_POST['bln2']=='05') {
								$_POST['bln2']='Mei';
							}
							if ($_POST['bln2']=='06') {
								$_POST['bln2']='Juni';
							}
							if ($_POST['bln2']=='07') {
								$_POST['bln2']='Juli';
							}
							if ($_POST['bln2']=='08') {
								$_POST['bln2']='Agustus';
							}
							if ($_POST['bln2']=='09') {
								$_POST['bln2']='September';
							}
							if ($_POST['bln2']=='10') {
								$_POST['bln2']='Oktober';
							}
							if ($_POST['bln2']=='11') {
								$_POST['bln2']='November';
							}
							if ($_POST['bln2']=='12') {
								$_POST['bln2']='Desember';
							}
						echo "<b>Tahun ".$_POST['tahun']."</b><br>
							<b> Bulan ".$_POST['bln1']." s/d Bulan ".$_POST['bln2']."</b>";
					}
					else
						echo "<b>Tahun ".date("Y")."</b>";
					?>
				</center>
				</div>
				<div class="chart_perbulan">
					<canvas id="myChart_bulan" width="100" height="100"></canvas>
				</div>
				<br>
				<br>

				<div style="font-size: 25px;">
					<center><b>PERTAHUN</b></center>
				</div>
				<table>
					<tr>
						<td>
							<select name="tahun1">
				                <option value="">Pilih Tahun</option>
				                <?php
				                $thn_skr = date('Y');
				                for ($x = $thn_skr; $x >= 2010; $x--) {
				                ?>
				                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
				                <?php
				                }
				                ?>
				            </select>
						</td>
						<td>s/d</td>
						<td>
							<select name="tahun2">
				                <option value="">Pilih Tahun</option>
				                <?php
				                $thn_skr = date('Y');
				                for ($x = $thn_skr; $x >= 2010; $x--) {
				                ?>
				                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
				                <?php
				                }
				                ?>
				            </select>
						</td>
						<td><input id="btn_cari" type="submit" value="CARI"></td>
					</tr>
				</table>
				<div id="center_tahun">
				<br>
				<center>
					<?php 
						if (isset($_POST['tahun1']) and $_POST['tahun1']!=NULL) {
						echo "<b>Tahun ".$_POST['tahun1']." s/d Tahun ".$_POST['tahun2']."</b>";
						}
						else
						{
							echo "<b>Grafik Tahunan</b>";
						}
					?>
				</center>
			</div>
				<div class="chart_pertahun">
					<canvas id="myChart_tahun" width="100" height="100"></canvas>
				</div>
			</form>
			<script name="perbulan">
            var ctx = document.getElementById("myChart_bulan");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($row_bln = mysqli_fetch_assoc($result_bulan)) { echo '"'.$row_bln['tanggal'].'"';?>,<?php }?>],
                    datasets: [{
                            label: "Pengunjung",
                            data: [<?php while ($row_cbln = mysqli_fetch_assoc($result_cbulan)) { echo '"'.$row_cbln['tanggal'].'"';?>,<?php }?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
		</script>
		<?php
		// PERTAHUN
			if (isset($_POST['tahun1']) and $_POST['tahun1']!=NULL) {
				$date_tahun = "select year(tanggal) as tanggal from pengunjung where year(tanggal) between '".$_POST['tahun1']."' and '".$_POST['tahun2']."' group by year(tanggal)";
				$result_tahun = mysqli_query($con, $date_tahun);
				$count_tahun = "select count(tanggal) as tanggal from pengunjung where year(tanggal) between '".$_POST['tahun1']."' and '".$_POST['tahun2']."' group by year(tanggal)";
				$result_count = mysqli_query($con,$count_tahun);
			}
			else{
				$date_tahun = "select year(tanggal) as tanggal from pengunjung group by year(tanggal)";
				$result_tahun = mysqli_query($con, $date_tahun);
				$count_tahun = "select count(tanggal) as tanggal from pengunjung group by year(tanggal)";
				$result_count = mysqli_query($con,$count_tahun);
			}
		?>
		<script name="pertahun">
            var ctx = document.getElementById("myChart_tahun");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($row_tahun = mysqli_fetch_assoc($result_tahun)) { echo '"Tahun '.$row_tahun['tanggal'].'"';?>,<?php }?>],
                    datasets: [{
                            label: "Pengunjung",
                            data: [<?php while ($row_cTahun = mysqli_fetch_assoc($result_count)) { echo '"'.$row_cTahun['tanggal'].'"';?>,<?php }?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
		</script>
<?php 
	require 'footer.php';
?>