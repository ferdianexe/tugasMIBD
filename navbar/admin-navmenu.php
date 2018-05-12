
<div class="index-navbar">
	
	<a class="brand" href="index.php">
		<img src="images/logo.png" alt="IMG">
		Salt Clinic
	</a>
	<a href="index.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"index.php")){echo 'class="active" ';}?>>Home</a>
	<a href="admin-jadwal.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"admin-jadwal.php")){echo 'class="active" ';}?>>Lihat Jadwal</a>
	<a href="admin-history.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"admin-history.php")){echo 'class="active" ';}?>>Lihat Catatan</a>
	<a href="daftar-dokter.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"daftar-dokter.php")){echo 'class="active" ';}?>>Daftar Dokter</a>
	<a href="daftar-user.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"daftar-user.php")){echo 'class="active" ';}?>>Daftar User</a>
	<a href="notifikasi.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"notifikasi.php")){echo 'class="active" ';}?>>Notifikasi</a>
	<div class='dropdown'>
		<button class='dropbtn'>Statistik</button>
		<div class='dropdown-content'>
		<ul>
			<li><a href="total-jam.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"total-jam.php")){echo 'class="active" ';}?>>Jam Kerja Dokter</a></li>
			<li><a href="total-pasien.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"total-pasien.php")){echo 'class="active" ';}?>>Jumlah Pasien</a></li>
			</ul>
		</div>
	</div>
	<a href="registration-dokter.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"registration-dokter.php")){echo 'class="active" ';}?>>Registrasi Dokter</a>
	<a href="addspesialisasi.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"addspesialisasi.php")){echo 'class="active" ';}?>>Tambah spesialisasi</a>
	<a style='float:right' href='logout.php'>Logout</a>
</div>