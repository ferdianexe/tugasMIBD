<div class="index-navbar">
		<a class="brand" href="index.php">
				<img src="images/logo.png" alt="IMG">
				Salt Clinic
		</a>
		<a href="index.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"index.php")){echo 'class="active" ';}?>>Home</a>
		<a href="dokter-create.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"dokter-create.php")){echo 'class="active" ';}?>>Buat Catatan</a>
		<a href="dokter-history.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"dokter-history.php")){echo 'class="active" ';}?>>Lihat Catatan</a>
		<a href="dokter-ubah-jadwal.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"dokter-ubah-jadwal.php")){echo 'class="active" ';}?>>Ubah Jadwal Praktek</a>

		<a style='float:right' href='logout.php'>Logout</a>
</div>