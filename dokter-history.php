<?php
	include ('connection/session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Catatan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class='index-navbar'>
			<?php include ('navbar/dokter-navmenu.php')?>
		</div>
			<div class="my-container">
				<?php
					if($_SERVER['REQUEST_METHOD']=='GET'){
						if(isset($_GET['username'])){
							include('-history-dokter-result.php');
							echo mysqli_error($conn);
						}else if(isset($_GET['edit'])){
							include('-history-dokter-result-edit.php');
						}
						else{
							include('-history-dokter-search.php');
						}
					}
				?>
			</div>
	</body>
</html>