<?php
    $conn = new mysqli("localhost","root","","mibd"); //login ke localhost username ferdian password , nama DB
    if($conn->connect_errno){
        echo "failed to connect";
    }
?>

