<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="index-navbar">
	<a class="brand" href="index.php">
			<img src="images/logo.png" alt="IMG">
			Salt Clinic
	</a>
	<a href="index.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"index.php")){echo 'class="active" ';}?>>Home</a>
	<a href="pemesanan.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"pemesanan.php")){echo 'class="active" ';}?>>Pemesanan</a>
	<a href="jadwal.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"jadwal.php")){echo 'class="active" ';}?>>Jadwal Praktek</a>
	<a href="history.php" <?php if(stripos($_SERVER['SCRIPT_NAME'],"history.php")){echo 'class="active" ';}?>>History</a>
  <a style='float:right' href='logout.php'>Logout</a>
</div>
<?php
			if ($_SESSION['priviledge'] != 1) {
				header("Location:404.php");
				exit();
			}
	?>