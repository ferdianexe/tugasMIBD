<?php
    include ('connection/session.php');
   $query = "SELECT idDokter 
             FROM dokter 
             WHERE idUser = $id";
    $result = $conn->query($query)->fetch_array();
    $idDokter = $result['idDokter'];
    $query = "SELECT *
              FROM jadwalpraktek
              WHERE idDokter = '$idDokter'
              ";
    
    $result = $conn->query($query);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['hari'])&&isset($_POST['jamMulai'])&&isset($_POST['jamSelesai'])){
            $day = $_POST['hari'];
            $startTime =$_POST['jamMulai'];
            $endTime =$_POST['jamSelesai'];
            $query = "SELECT idDokter
                      FROM dokter
                      Where idUser =$id";
            $result = $conn->query($query)->fetch_array();
            $idDokter = $result['idDokter'];
            $query="SELECT *
                    FROM jadwalPraktek
                    WHERE idDokter =$idDokter AND hari=$day";
            $result =$conn->query($query)->fetch_array();
            echo mysqli_error($conn);
            if($result){
                $query = "UPDATE jadwalPraktek
                          SET waktuMulai='$startTime',waktuSelesai='$endTime'
                          WHERE idDokter=$idDokter AND hari=$day";
                $result =$conn->query($query);
            }else{
                echo "kesini";
                $query = "INSERT INTO jadwalPraktek(idDokter,waktuMulai,waktuSelesai,hari)
                          VALUES ('$idDokter','$startTime','$endTime','$day')";
                $result =$conn->query($query);
            }
            if($result){
               header('Location:dokter-ubah-jadwal.php');
            }
           exit();
        }else{
           header('Location:dokter-ubah-jadwal.php?edit=1');
        }
        //header('Location:dokter-ubah-jadwal.php');
    }
    echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Index</title>
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
		<div class='index-navbar'>
			<?php include ('navbar/dokter-navmenu.php')?>
			<div class="container">
                <?php
                    if($_SERVER['REQUEST_METHOD']=="GET"){
                        if(isset($_GET['edit'])){
                            include('dokter-edit.php');
                        }else{
                            include('jadwalnow.php');
                        }
                    }
                ?>
                
		</div>
	</body>
</html>