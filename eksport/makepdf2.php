<?php
  require 'tcpdf/tcpdf.php';
  require '../koneksi.php';

  $q = "SELECT * FROM aktivitas";
  $rslt = mysqli_query($con,$q);

  $tcpdf=new TCPDF("P");

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
    <h1>Tabel pengamatan</h1>
    <table border=\"1\" cellpadding=\"5\">
      <tr>
        <th>Id aktivitas</th>
        <th>Id Pengamatan</th>
        <th>Id Aksi</th>
        <th>Nilai Suhu</th>
        <th>Nilai Kelembapan</th>
        <th>Nama Aksi</th>
        <th>Waktu aktivitas</th>
      </tr>";

    $str_db = "";
    while ($record= mysqli_fetch_assoc($rslt)){
      $str_db .="     
      <tr>
        <td>".$record['id_aktivitas']."</td>
        <td>".$record['id_pengamatan']."</td>
        <td>".$record['id_aksi']."</td>
        <td>".$record['nilai_suhu']."</td>
        <td>".$record['nilai_kelembapan']."</td>
        <td>".$record['nama_aksi']."</td>
        <td>".$record['waktu']."</td>
      </tr>";

    }
  $html = $html.$str_db."
    </table>
    <div id=\"lokasi\"></div>
  </body>
  </html>";

  $tcpdf->writeHTMLCell(0,0,10,10,$html);
  $tcpdf->AddPage();
  $xc = 105;
  $yc = 100;
  $r = 50;

  $sql="SELECT COUNT(nama_aksi) AS jumlah FROM aktivitas WHERE nama_aksi=\"penyiraman\"";
  $result=mysqli_query($con,$sql);
  $row1=mysqli_num_rows($result);
  $roww1=$row1;
  $row1*=33;

  
  $sql="SELECT COUNT(nama_aksi) AS jumlah FROM aktivitas WHERE nama_aksi=\"penerangan\"";
  $result=mysqli_query($con,$sql);
  $row2=mysqli_num_rows($result);
  $roww2=$row2;
  $row2*=33;

  $tcpdf->write(50,"Pengamatan Aktivitas");
  $tcpdf->SetFillColor(0, 0, 255);
  $tcpdf->PieSector($xc, $yc, $r, 0, $row1, 'FD', false, 0, 2);

  $tcpdf->SetFillColor(0, 255, 0);
  $tcpdf->PieSector($xc, $yc, $r, $row1, 0, 'FD', false, 0, 2);

  // write labels
  $tcpdf->SetTextColor(255,255,255);
  $tcpdf->Text(70, 110, "Penerangan ");
  $tcpdf->Text(125, 90, 'Penyiraman ');
  //$tcpdf->Text(120, 115, 'RED');


  $tcpdf->Output("no3.pdf","I");
 ?>
