<?php require 'header.php'; ?>

<center><h1 id="masuk">Masuk</h1></center>
<form method="post" action="in.php">
	<table id="tbl_pengunjung">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td>
				<input type="text" name="username" 
					placeholder="Username" required>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>
				<input type="password" name="password" 
					placeholder="Password" required>
			</td>
		</tr>
		<tr>
			<td id="btn_masuk" colspan="3" style="padding-top: 15px;">
				<input type="submit" value="Masuk">
			</td>
			<td id="btn_batal" style="padding-top: 15px;">
				<input type="button" value="Batal" 
					onclick="window.location='index.php';">
			</td>
		</tr>
	</table>
</form>

<?php require 'footer.php'; ?>