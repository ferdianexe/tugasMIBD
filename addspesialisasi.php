<?php
    include('connection/session.php');
    $query = "SELECT *
              FROM Spesialisasi
              ";
    $result = $conn->query($query);
	echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>History</title>
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
			<?php include('navbar/admin-navmenu.php')?>	
			<div class="container">
				<table class='table table-striped'>
					<tr>
						<th>idSpesialisasi</th>
						<th>Nama Spesialisasi</th>
					</tr>
							<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['idSpesialisasi']."</td>
									<td>".$row['namaSpesialisasi']."</td>
									</tr>";
							}
						}
                    ?>
				</table>
			</div>
		
	</body>
</html>