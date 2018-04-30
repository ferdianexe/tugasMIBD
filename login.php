<?php
    include('connection/connection.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT idUser,password,priviledge,nama,jenisKelamin
         FROM users 
        WHERE username= '$username' ";
        $result = $conn->query($query)->fetch_array();
        
        $_SESSION['namaUser'] = $result['nama'];
        $_SESSION['gender'] = $result['jenisKelamin'];
        $_SESSION['priviledge'] = $result['priviledge'];
        $_SESSION['id'] = $result['idUser'];
        if($result){
            if($result['password']===$password){
                header("Location: index.php");
            }else{
                echo "password salah ";
            }
        }else{
            header("Location: login.html");
        }
       // header("Location:Index.php");
    }else{
        header("Location: login.html");
    }
 ?>