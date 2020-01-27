<?php
  require './tcpdf/tcpdf.php';
  require 'connection.php';

  $sql="SELECT * FROM tblog";
  $result=mysqli_query($conn,$sql);

  $tcpdf=new TCPDF("P");

  $tcpdf->AddPage();

  $html="
    <html>
      <head>
      </head>
      <body>
        <h1>Tabel Data Log Akses Ruangan Server</h1>
        <table border=\"1\" colspan=\"5\">
          <tr>
            <td align=\"center\">ID Kartu</td>
            <td align=\"center\">Nama</td>
            <td align=\"center\">Jabatan</td>
            <td align=\"center\">Tanggal</td>
            <td align=\"center\">Status</td>
          </tr>
  ";

  while ($row=mysqli_fetch_assoc($result)) {
    $html.="
    <tr>
      <td align=\"center\">".$row['idteknisi']."</td>
      <td align=\"center\">".$row['nama']."</td>
      <td align=\"center\">".$row['jabatan']."</td>
      <td align=\"center\">".$row['tanggal']."</td>
      <td align=\"center\">".$row['status']."</td>
    </tr>";
  }
  $html.="
    </table>
    </body>
    </html>
  ";
  $tcpdf->writeHTMLCell(0,0,10,10,$html);
  $tcpdf->AddPage();
  $xc = 105;
  $yc = 100;
  $r = 50;

  $sql="SELECT * FROM tblog WHERE CAST(tanggal AS DATE)='".$_GET['date1']."'";
  $result=mysqli_query($conn,$sql);
  $row1=mysqli_num_rows($result);
  $row1*=33;

  $sql="SELECT * FROM tblog WHERE CAST(tanggal AS DATE)='".$_GET['date2']."'";
  $result=mysqli_query($conn,$sql);
  $row2=mysqli_num_rows($result);
  $row2*=33;

  /*$tcpdf->SetFillColor(0, 0, 255);
  $tcpdf->PieSector($xc, $yc, $r, 0, $row1, 'FD', false, 0, 2);

  $tcpdf->SetFillColor(0, 255, 0);
  $tcpdf->PieSector($xc, $yc, $r, $row1, 0, 'FD', false, 0, 2);

  $tcpdf->SetTextColor(255,255,255);
  $tcpdf->Text(0, 0, '11 november');*/
  //$tcpdf->Text(60, 95, '12 november');
  $tcpdf->write(50,"Chart Data Log Akses Ruangan Server");
  $tcpdf->SetFillColor(0, 0, 255);
  $tcpdf->PieSector($xc, $yc, $r, 0, $row1, 'FD', false, 0, 2);

  $tcpdf->SetFillColor(0, 255, 0);
  $tcpdf->PieSector($xc, $yc, $r, $row1, 0, 'FD', false, 0, 2);

  //$tcpdf->SetFillColor(255, 0, 0);
  //$tcpdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

  // write labels
  $tcpdf->SetTextColor(255,255,255);
  $tcpdf->Text(90, 70, '11 november');
  $tcpdf->Text(95, 125, '12 november');
  //$tcpdf->Text(120, 115, 'RED');


  $tcpdf->Output("no3.pdf","I");
 ?>
