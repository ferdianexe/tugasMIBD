<?php
    include('connection/session.php');
    session_unset(); 
    session_destroy(); 
    header("location:login.html");
?>