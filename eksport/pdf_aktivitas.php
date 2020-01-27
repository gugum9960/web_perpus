<?php
  require 'tcpdf/tcpdf.php';
  require '../koneksi.php';

  if (isset($_POST['h_sql'])) {
    $rslt = mysqli_query($con,$_POST['h_sql']);
  }
  else
  {
    $q = "SELECT * FROM pengunjung";
    $rslt = mysqli_query($con,$q);
  }

  $tcpdf=new TCPDF("L", "mm", "F4", true, 'UTF-8', false);

  $tcpdf->AddPage();


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
    <h1>Tabel Daftar Pengunjung</h1>
    <table border=\"1\" cellpadding=\"3\">
      <tr>
        <th width=\"25\" style=\"text-align: center;\">No</th>
        <th style=\"text-align: center;\">Tanggal</th>
        <th style=\"text-align: center;\">Nama</th>
        <th style=\"text-align: center;\">Jenis Kelamin</th>
        <th style=\"text-align: center;\">No Handphone</th>
        <th style=\"text-align: center;\">Email</th>
        <th style=\"text-align: center;\">Profesi</th>
        <th style=\"text-align: center;\">Lembaga</th>
        <th style=\"text-align: center;\">Alamat</th>
        <th style=\"text-align: center;\">Keperluan</th>
        <th style=\"text-align: center;\">Keterangan</th>
      </tr>";
    $x=1;
    $str_db = "";
    while ($record= mysqli_fetch_assoc($rslt)){
      $str_db .="     
      <tr>
        <td style=\"text-align: center;\">".$x."</td>
        <td>".$record['tanggal']."</td>
        <td>".$record['nama']."</td>
        <td>".$record['jenis_kelamin']."</td>
        <td>".$record['no_hp']."</td>
        <td>".$record['email']."</td>
        <td>".$record['profesi']."</td>
        <td>".$record['lembaga']."</td>
        <td>".$record['alamat']."</td>
        <td>".$record['keperluan']."</td>
        <td>".$record['keterangan']."</td>
      </tr>";
      $x++;

    }
  $html = $html.$str_db."
    </table>
    <div id=\"lokasi\"></div>
  </body>
  </html>";

  $tcpdf->writeHTMLCell(0,0,10,10,$html);
  $tcpdf->Output("Laporan Pengunjung Perpustakaan.pdf","I");
 ?>