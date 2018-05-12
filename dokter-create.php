<?php
    include('connection/session.php');
    
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (isset($_POST['nama'])&&$_POST['nama']!="") {
              $date = $_POST['tanggal'];
              $text = $_POST['catatan'];
              $namaid =$_POST['nama'];
              $biaya =(int)$_POST['biaya'];
              $dateEnd = new DateTime();
              $dateEnd->setTimezone(new DateTimeZone("Asia/Jakarta"));
              $dateEnd->modify("+30 minutes");
              $waktuSelesai= $dateEnd->format('H:i:s');
              $query = "UPDATE penanganan
				  SET waktuMulai =now(),waktuSelesai='$waktuSelesai',tanggal='$date',catatan='$text'
				  WHERE idPenanganan = $namaid";
        
              $result= $conn->query($query);
              if ($result) {
                  $query = "UPDATE pekerjaandokter
					  SET sudahBertemu = 1
					  WHERE idPenanganan =$namaid";
                  $conn->query($query);
              }
              $_SESSION['formSuccess'] ="true" ;
              echo mysqli_error($conn);
          } else {
              $_SESSION['orderErrorId']=5;
          }
          header("Location:dokter-create.php");
          exit();
      }
    $orderQuery = "SELECT  users.nama as nama , users.username as username ,tOrder.idPenanganan as id 
				   FROM (
				  		SELECT idPasien,idPenanganan FROM `pekerjaandokter` 
						WHERE waktuTemu = DATE_FORMAT(now(),'%Y-%m-%d') AND  sudahBertemu = 0
     					) as tOrder
				 INNER JOIN users on users.idUser = tOrder.idPasien
				";
    $orderResult = $conn->query($orderQuery);
    echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Buat Catatan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class='index-navbar'>
			<?php
                include('navbar/dokter-navmenu.php');
            ?>
		</div>		
			<div class="my-container centered-container">
				<h3 style='padding-bottom:10px;'>Buat Catatan</h3>
				<div>
					<form method='POST' action="">
						<div class="input-box">
              			<p>Nama</p>
							<select class='my-form' id="spec"   name="nama">
								<option value="" disabled selected hidden >Username</option>
								<?php
                                    while ($row=$orderResult->fetch_array()) {
                                        $id = $row['id'];
                                        $nama = $row['nama'];
                                        $usr = $row['username'];
                                        echo "<option value=$id> $nama ($usr) </option>";
                                    }
                                ?>
							</select>
            			</div>
						<div class="input-box">
							<p>Tanggal</p>
							<input class="my-form" type="date" name="tanggal" placeholder="Tanggal">
						</div>
						<div class='input-box'>
							<p>Catatan</p>
							<textarea class="my-form" rows="5" name="catatan" id="comment"></textarea>
						</div>
						<div class='input-box'>
							<p>Biaya</p>
							<input class="my-form" type="text" name="biaya" placeholder="Rp.0,-">
						</div>
						<div class="container-menu-btn">
							<button class="menu-btn">
								Pesan !!
							</button>
						</div>
					</form>
					<div>
						<?php
                            if (isset($_SESSION['orderErrorId'])) {
                                echo "<p> Tolong masukan data dengan benar </p>";
                                unset($_SESSION['orderErrorId']);
                            } elseif (isset($_SESSION['formSuccess'])) {
                                if ($_SESSION['formSuccess']) {
                                    unset($_SESSION['formSuccess']);
                                    echo "<p> Data Sudah tersubmit </p>";
                                } else {
                                    echo $_SESSION['formSuccess'];
                                }
                            }
                        ?>
					</div>
				</div>
			</div>
	</body>
</html>
