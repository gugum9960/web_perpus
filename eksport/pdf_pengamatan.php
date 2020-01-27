<?php
	require_once 'tcpdf/tcpdf.php';

	$tcpdfku = new TCPDF("L");

	$tcpdfku->AddPage();

	require '../koneksi.php';
	$q = "SELECT * FROM pengamatan";
	$rslt = mysqli_query($con,$q);



	$html = "
	<html>
	<head>
		<script type=\"text/javascript\" src=\"fusionchart/js/fusioncharts.js\"></script>
	<script type=\"text/javascript\">
		FusionCharts.ready(function()
		{
				var G1 = new FusionCharts
				(
					{
						\"type\":\"column2d\",
						\"renderAt\":\"lokasi\",
						\"width\":\"800\",
						\"height\":\"600\",
						\"dataFormat\":\"json\",
						\"dataSource\":{
							\"chart\":{
								\"caption\":\"Pendapatan Bulanan\",
								\"subCaption\":\"Warkop Tekom\",
								\"xAxisName\":\"Bulan\",
								\"yAxisName\":\"Pendapatan\"
							},
							\"data\":[
								{\"label\":\"Jan\",\"value\":\"100\"},
								{\"label\":\"Feb\",\"value\":\"150\"},
								{\"label\":\"Mar\",\"value\":\"120\"}
							]
						}
					}
				);
				G1.render();
			}
		);
	</script>
	</head>
	<body>
		<h1>Tabel pengamatan</h1>
		<table border=\"1\" cellpadding=\"5\">
			<tr>
				<th>No</th>
				<th>Nilai Suhu</th>
				<th>Nilai Kelembapan</th>
				<th>Waktu</th>
			</tr>";

		$str_db = "";
		while ($record= mysqli_fetch_assoc($rslt)){
			$str_db .="			
			<tr>
				<td>".$record['id_pengamatan']."</td>
				<td>".$record['nilai_suhu']."</td>
				<td>".$record['nilai_kelembapan']."</td>
				<td>".$record['waktu']."</td>
			</tr>";

		}
	$html = $html.$str_db."
		</table>
		<div id=\"lokasi\"></div>
	</body>
	</html>";

	$tcpdfku->WriteHTMLCell(0,0,10,10,$html);


	$tcpdfku->Output('no1.pdf','I');

?>