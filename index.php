<?php
	include 'header.php';
?>
				<h1>BUKU TAMU<br>
					PENGUNJUNG PERPUSTAKAAN
				</h1>
				
				<?php
					/*if (isset($_POST['nama'])) {
				?>
				<script type="text/javascript">
					alert("Silahkan Masuk");
				</script>
				<?php }
					else{
				?>
				<script type="text/javascript">
					alert("Selamat Datang di Perpustakaan Puslitbang Perkebunan");
				</script>
				<?php } */?>

				<form name="pengunjung" method="post" action="insert.php">
					<table id="tbl_pengunjung">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input style="height: 30px;width: 480px" type="text" name="nama" placeholder="Nama Lengkap" required></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><input type="radio" value="Laki-laki" name="jenis_kelamin" checked>Laki-Laki</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="radio" value="Perempuan" name="jenis_kelamin" >Perempuan</td>
						</tr>
						<tr>
							<td>No. Telp/HP</td>
							<td>:</td>
							<td><input style="height: 30px;width: 480px" type="text" name="no_hp" placeholder="No. Telp/HP" required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input style="height: 30px;width: 480px" type="text" name="email" placeholder="example@example.com" required></td>
						</tr>
						<tr>
							<td>Profesi</td>
							<td>:</td>
							<td><select style="height: 30px;width: 480px" name="profesi" required>
									<option value="">---Pilih Profesi---</option>
									<option value="Karyawan/Staff">Karyawan/Staff</option>
									<option value="Peneliti">Peneliti</option>
									<option value="Penyuluh">Penyuluh</option>
									<option value="Pengusaha">Pengusaha</option>
									<option value="Petani">Petani</option>
									<option value="Pustakawan">Pustakawan</option>
									<option value="Dosen">Dosen</option>
									<option value="Mahasiswa">Mahasiswa</option>
									<option value="Pelajar">Pelajar</option>
									<option value="Umum">Umum</option>
									<option value="Swasta">Swasta</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Lembaga</td>
							<td>:</td>
							<td><input style="height: 30px;width: 480px" type="text" name="lembaga" placeholder="Lembaga" required></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><textarea style="height: 50px; width: 480px" placeholder="Alamat" required name="alamat"></textarea></td>
						</tr>
						<tr>
							<td>Keperluan</td>
							<td>:</td>
							<td><textarea style="height: 50px; width: 480px" placeholder="Keperluan berkunjung" required name="keperluan"></textarea></td>
						</tr>
						<tr>
							<td>Subyek yang dibutuhkan</td>
							<td>:</td>
							<td><textarea style="height: 50px; width: 480px" placeholder="Keterangan" required name="keterangan"></textarea></td>
						</tr>
						<tr>
							<td id="button_ok" colspan="3">
								<input type="submit" value="OK" onclick="click_ok()">
							</td>
						</tr>
					</table>
				</form>
<?php
	require 'footer.php';
?>