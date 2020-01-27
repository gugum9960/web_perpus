<?php
require_once('tcpdf_include.php');

$pdf = new TCPDF();
$pdf->AddPage();
$txt = '
Membuat pdf menggunakan TCPDF class php
Manajemen Informatika IPB 51

Bogor
2016'
;

$pdf->Write(0,$txt);
$pdf->AddPage();


$html ='
   <table border="1">
      <tr>
         <td>1</td>
         <td>2</td>
         <td>3</td>
         <td>4</td>
      </tr>
      <tr>
         <td>5</td>
         <td>6</td>
         <td>7</td>
         <td>8</td>
      </tr>
      <tr>
         <td>9</td>
         <td>10</td>
         <td>11</td>
         <td>12</td>
      </tr>
   </table>
';

$pdf->WriteHTML($html);


mysql_connect("localhost","root","");
mysql_select_db("plpw");
$q = "SELECT id,nama,harga,stok FROM menu";
$h = mysql_query($q);
$str='<table align="center">
         <tr><th width="50">ID</th><th>NAMA</th><th>HARGA</th><th>STOK</th></tr>';
while($r = mysql_fetch_assoc($h)){
    $str .= '<tr><td>'.$r['id'].'</td><td>'.$r['nama'].'</td><td align="right">'.$r['harga'].'&nbsp;&nbsp;</td><td align="center">'.$r['stok'].'</td></tr>';
}
$pdf->WriteHTML($str);

$pdf->Output('dok_01.pdf','I');

?>