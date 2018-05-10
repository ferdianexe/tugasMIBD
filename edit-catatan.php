<?php
    include('connection/session.php');
    $newCat = $_POST['catatan'];
    $idP = $_SESSION['EditID'];
    $query = "UPDATE penanganan
              SET catatan ='$newCat' , waktuPengubahan=now()
              WHERE idPenanganan=$idP
    ";
    $result =$conn->query($query);
    echo $query;
    if($result){
        unset($_SESSION['EditID']);
        header("Location:dokter-history.php");
    }else{
        echo mysqli_error($conn);
    }
    
?>