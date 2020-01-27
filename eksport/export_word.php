  <?php
    
      header("Content-Type: application/msword");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("content-disposition: attachment;filename=Laporan Pengunjung Perpustakaan.doc");
    
  ?>

<?php
  require '..\koneksi.php';

  if (isset($_POST['h_sql'])) {
    $result = mysqli_query($con, $_POST['h_sql']);
  }
  else
  {
    $query = "select * from pengunjung";
    $result = mysqli_query($con, $query);
  }
?>
<html>
<head>
  <title>Ekspor PHP ke MSWORD</title>
</head>
<body>
<h1>Daftar Pengunjung Perpustakaan</h1>
    <table border="1" cellpadding="3">
      <tr>
        <th width="25" style="text-align: center;">No</th>
        <th width="50" style="text-align: center;">Tanggal dan Waktu</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Jenis Kelamin</th>
        <th style="text-align: center;">No Handphone</th>
        <th style="text-align: center;">Email</th>
        <th style="text-align: center;">Profesi</th>
        <th style="text-align: center;">Lembaga</th>
        <th style="text-align: center;">Alamat</th>
        <th style="text-align: center;">Keperluan</th>
        <th style="text-align: center;">Keterangan</th>
      </tr>
<?php
    $x=1;
    while ($record= mysqli_fetch_assoc($result)){
    ?>  
      <tr>
        <td style="text-align: center;"><?php echo $x;?></td>
        <td><?php echo $record['tanggal'];?></td>
        <td><?php echo $record['nama'];?></td>
        <td><?php echo $record['jenis_kelamin'];?></td>
        <td><?php echo $record['no_hp'];?></td>
        <td><?php echo $record['email'];?></td>
        <td><?php echo $record['profesi'];?></td>
        <td><?php echo $record['lembaga'];?></td>
        <td><?php echo $record['alamat'];?></td>
        <td><?php echo $record['keperluan'];?></td>
        <td><?php echo $record['keterangan'];?></td>
      </tr>
      <?php
      $x++;

    } ?>
 
</body>
</html>