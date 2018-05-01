<?php
   include('connection.php');
   session_start();
   
   if (!isset($_SESSION['namaUser'])) {
       header("location:login.html");
   }
   $namaUser = $_SESSION['namaUser'];
   $gender = $_SESSION['gender'];  //P = perempuan L = Laki laki
   $id = $_SESSION['id'];
   if(!stripos($_SERVER['SCRIPT_NAME'],"dokter-create.php")){
    $_SESSION["formSuccess"] = false ;//required
   }
   if(!stripos($_SERVER['SCRIPT_NAME'],"registration-dokter.php")){
   $_SESSION["formSuccess1"] = false ; ;//required
   }
  
   ?>
 
