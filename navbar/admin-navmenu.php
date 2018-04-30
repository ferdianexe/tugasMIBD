<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">
							<img src="images/logo.png" alt="IMG" style='width:25px; display:inline-block;'>
							Salt Clinic
						</a>
					</div>
					<ul class="nav navbar-nav">
						<?php
							$linkRequest = $_SERVER['SCRIPT_NAME']; 
						?>
						<li <?php if(stripos($_SERVER['SCRIPT_NAME'],"index.php")){echo 'class="active" ';}?>><a href="index.php">Home</a></li>
						<li <?php if(stripos($_SERVER['SCRIPT_NAME'],"admin-jadwal.php")){echo 'class="active" ';}?>><a href="admin-jadwal.php">Lihat Jadwal</a></li>
						<li <?php if(stripos($_SERVER['SCRIPT_NAME'],"admin-history.php")){echo 'class="active" ';}?>><a href="admin-history.php">Lihat Catatan</a></li>
                        <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"daftar-dokter.php")){echo 'class="active" ';}?>><a href="daftar-dokter.php">Daftar Dokter</a></li>
                        <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"daftar-user.php")){echo 'class="active" ';}?>><a href="daftar-user.php">Daftar User</a></li>
                        <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"notifikasi.php")){echo 'class="active" ';}?>><a href="notifikasi.php">Notifikasi</a></li>
						<li><div class="adminbutton">
							<button class="adminstastik">Statistik</button>
							<div class="adminstastik-content">
   							 <a href="total-jam.php">Jam Kerja Dokter</a>
   							 <a href="total-pasien.php">Jumlah Pasien</a>
 							 </div>
							</div>
						</li>
						<li <?php if(stripos($_SERVER['SCRIPT_NAME'],"registration-dokter.php")){echo 'class="active" ';}?>><a href="registration-dokter.php">Registrasi Dokter</a></li>
					</ul>
					<form class="navbar-form navbar-left" action="">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" name="search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Logout</a></li>
					</ul>
				</div>
			</nav>