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
		<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			if ($_SESSION['priviledge'] == 3) {
				include("admin-index.php");
			} elseif ($_SESSION['priviledge'] == 2) {
				include("dokter-index.php");
			} else{
				include("user-index.php");
			}
		?>
	</body>
</html>