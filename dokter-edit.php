<h3 style='padding-bottom:10px;'>Ganti Jadwal</h3>
				<div style='width:500px;'>
					<form method='POST' action="dokter-ubah-jadwal.php">
                        <div class="input-box">
                             <p>Pilih Hari</p>
                                <select class='form-control input' name="hari">
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
                            <input class="input" type="time" name="jamMulai" placeholder="Tanggal">
                            <span class="focus-input"></span>
                            <span class="symbol-input">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="input-box">
                            <p>Selesai</p>
                            <input class="input" type="time" name="jamSelesai" placeholder="Tanggal">
                            <span class="focus-input"></span>
                            <span class="symbol-input">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
						<div class="login-container-form-btn">
							<button class="login-form-btn">
								Ganti Jadwal / Tambah Jadwal
							</button>
						</div>
					</form>
				