<?php
  if(isset($_GET['exportXL'])){
    header("location:./PHPExcel/makeexcel.php?date1=".$_GET['date1']."&date2=".$_GET['date2']."");
  }elseif (isset($_GET['exportPDF'])) {
    $date1=$_GET['date1'];
    $date2=$_GET['date2'];
    header("location:makepdf.php?date1=$date1&date2=$date2");
  }
 ?>
 