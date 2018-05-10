<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemesanan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			include('navbar/user-navbar.php'); 
		?>
		<div class='my-container'>
			<?php
				if($_SERVER['REQUEST_METHOD']=='GET'){
					if(isset($_GET['sucess'])){
						if($_GET['sucess']){
							echo "<h2>PENDAFTARAN SUCCESS</h2>";
						}
					}else{
						echo "<h2>SUDAH PERNAH MEMESAN</h2>";
					}
				}
			?>
            
        </div>
	</body>
</html>
