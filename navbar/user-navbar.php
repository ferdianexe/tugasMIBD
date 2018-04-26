<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="IMG" style='width:25px; display:inline-block;'>
                    Salt Clinic
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"index.php")){echo 'class="active" ';}?>><a href="index.php">Home</a></li>
                <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"pemesanan.php")){echo 'class="active" ';}?>><a href="pemesanan.php">Pemesanan</a></li>
                <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"jadwal.php")){echo 'class="active" ';}?>><a href="jadwal.php">Jadwal Praktek</a></li>
                <li <?php if(stripos($_SERVER['SCRIPT_NAME'],"history.php")){echo 'class="active" ';}?>><a href="history.php">History</a></li>
            </ul>
            <form class="navbar-form navbar-left" action="">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class='nav navbar-nav navbar-right'>
                    <li><a href='logout.php'>Logout</a></li>
            </ul>
        </div>
</nav>