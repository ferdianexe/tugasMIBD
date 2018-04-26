<?php
   include('connection.php');
   session_start();
   
   if (!isset($_SESSION['namaUser'])) {
       header("location:login.html");
   }
   $namaUser = $_SESSION['namaUser'];
   $gender = $_SESSION['gender'];  //P = perempuan L = Laki laki
   $id = $_SESSION['id'];
   
   ?>
 
