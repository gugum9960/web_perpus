<?php 
	require 'header.php';
	if (isset($_POST['cari_tgl'])) {
		$query = "select * from pengunjung where tanggal between '".$_POST['cari_tgl']."' and '".$_POST['cari_tgl2']."'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
	}
	else {
		$query = "select * from pengunjung";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
	}

	if (isset($_POST['cari_tgl'])) {
		$hidden = "select * from pengunjung where tanggal between '".$_POST['cari_tgl']."' and '".$_POST['cari_tgl2']."'";
	}
?>
			<b><center><div id="TLap">DAFTAR PENGUNJUNG PERPUSTAKAAN</div></center></b> 
			<br>
			<form method="post" action="eksport/eks.php">
			<div>
				<button type="submit" class="btn_excel" name="excel">Unduh Dalam Excel</button>
				<?php
					if (isset($_POST['cari_tgl'])) {
				?>
				<input type="hidden" name="h_sql" value="<?php echo $hidden; ?>">
				<?php }?>
			</div>
			</form>

			<form style="padding-top: 5px;" method="post" action="eksport/pdf_aktivitas.php" target="_blank">
			<div>
				<button type="submit" class="btn_pdf" name="pdf">Unduh Dalam PDF</button>
				<?php
				if (isset($_POST['cari_tgl'])) {
				?>
				<input type="hidden" name="h_sql" value="<?php echo $hidden; ?>">
				<?php }?>
			</div>
			</form>
			
			<form style="padding-top: 5px;" method="post" action="eksport/export_word.php">
			<div>
				<button type="submit" class="btn_word" name="pdf">Unduh Dalam Word</button>
				<?php
				if (isset($_POST['cari_tgl'])) {
				?>
				<input type="hidden" name="h_sql" value="<?php echo $hidden; ?>">
				<?php }?>
			</div>
			</form>

			<form method="post">
				<table id="cari_table">
					<tr>
						<td>Tanggal :</td>
						<td><input type="date" name="cari_tgl" required></td>
						<td>s/d</td>
						<td><input type="date" name="cari_tgl2" required></td>
						<td><input id="btn_cari" type="submit" value="CARI"></td>
					</tr>
				</table>
			</form>

			<div class="count">
				<b>Jumlah Data : <?php echo "$count"; ?></b>
			</div>	

			<br>
			<div id="Tdata">
				<table border="1" rules="all" cellpadding="5">
					<tr>
						<th class="Ttable">No</th>
						<th width="60" class="Ttable">Tanggal</th>
						<th class="Ttable">Nama</th>
						<th class="Ttable">Jenis Kelamin</th>
						<th class="Ttable">No Telp/HP</th>
						<th class="Ttable">Email</th>
						<th class="Ttable">Profesi</th>
						<th class="Ttable">Lembaga</th>
						<th class="Ttable">Alamat</th>
						<th class="Ttable">Keperluan</th>
						<th class="Ttable">Keterangan</th>
					</tr>

					<?php
					$x=1;
						while ($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						
						<td class="nomor" style="text-align: center;"><?php echo $x;?></td>
						<td class="nomor"><?php echo $row['tanggal'];?></td>
						<td class="nomor"><?php echo $row['nama'];?></td>
						<td class="nomor"><?php echo $row['jenis_kelamin'];?></td>
						<td class="nomor"><?php echo $row['no_hp'];?></td>
						<td class="nomor"><?php echo $row['email'];?></td>
						<td class="nomor"><?php echo $row['profesi'];?></td>
						<td class="nomor"><?php echo $row['lembaga'];?></td>
						<td class="nomor"><?php echo $row['alamat'];?></td>
						<td class="nomor"><?php echo $row['keperluan'];?></td>
						<td class="nomor"><?php echo $row['keterangan'];?></td>
					</tr>
						<?php $x++; }?>
				</table>
			</div>
			<?php 
				if ($count == 0) {
					echo "<script language='javascript'>alert('Data tidak tersedia atau tidak ditemukan')</script>";
				}
			?>
<?php 
	require 'footer.php';
?>