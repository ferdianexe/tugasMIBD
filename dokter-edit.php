<div class='centered-container'>
<h3 style='padding-bottom:10px;'>Ganti Jadwal</h3>
	<form method='POST' action="dokter-ubah-jadwal.php">
		<div class="input-box">
			<p>Pilih Hari</p>
			<select class='my-form' name="hari">
			<option value="" disabled selected hidden>Pilih Hari</option>
			<option value="1">Senin</option>
			<option value="2">Selasa</option>
			<option value="3">Rabu</option>
			<option value="4">Kamis</option>
			<option value="5">Jumat</option>
			<option value="6">Sabtu</option>
			<option value="7">Minggu</option>
				<!-- belum bisa diaplikasikan -->
				</select>
		</div>
		<div class="input-box">
				<p>Mulai Kerja</p>
				<input class="my-form" type="time" name="jamMulai" placeholder="Tanggal">
		</div>
		<div class="input-box">
				<p>Selesai</p>
				<input class="my-form" type="time" name="jamSelesai" placeholder="Tanggal">
		</div>
		<div class="container-menu-btn">
			<button class="menu-btn">
				Ganti Jadwal / Tambah Jadwal
			</button>
		</div>
	</form>
</div>