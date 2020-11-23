<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'includes/conn.php';
   
        $username = $_POST["username"];
        $pass = $_POST["password"]; 
        $sql = "Select * from devologixadmin where username='$username' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: admin");
        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
?>