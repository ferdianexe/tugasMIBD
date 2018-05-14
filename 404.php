<?php
	include ('connection/session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Index</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
    <?php
        if($_SESSION['priviledge']==1){
            include ('navbar/user-navbar.php'); 
        }else if($_SESSION['priviledge']==2){
            include ('navbar/dokter-navmenu.php');
        }else{
            include ('navbar/admin-navmenu.php');
        }
    ?>
        <h2>LAMAN TIDAK TERSEDIA</h2>
	</body>
</html>