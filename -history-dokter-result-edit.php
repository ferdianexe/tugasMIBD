<?php
    //no need session this is include page
    $idP = $_GET['edit'];
    $query = "SELECT tanggal,catatan,tuser.nama as 'nama'
              FROM penanganan
              INNER JOIN pekerjaanDokter as tdokter on tdokter.idPenanganan=penanganan.idPenanganan
              INNER JOIN users as tuser on tdokter.idPasien=tuser.idUser
              WHERE tdokter.idPenanganan=$idP";
    $result = $conn->query($query)->fetch_array();
    $_SESSION['EditID'] = $idP;
    echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Buat Catatan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>		
			<div class="container">
				<h3 style='padding-bottom:10px;'>Edit Catatan</h3>
				<div style='width:500px;'>
					<form method='POST' action="edit-catatan.php">
						<div class="input-box">
                           <p>Nama</p>
                           <?php
                            echo $result['nama'];
                           ?>
                        </div>
						<div class="input-box">
                            <p>Tanggal</p>
                            <?php
                                echo $result['tanggal'];
                            ?>
                        </div>
						<div class='input-box'>
							<p>Catatan</p>
							<textarea class="form-control" rows="5" name="catatan" id="comment"><?php echo $result['catatan']?></textarea>
						</div>
						<div class="login-container-form-btn">
							<button class="login-form-btn">
								EDIT
							</button>
						</div>
					</form>
				</div>
			</div>
	</body>
</html>
