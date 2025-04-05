<?php 
    include "server.php";


    function uploadUser($username, $password, $role) {
        initSql();
        global $conn;
        $sql = "insert into users (username, password, role) VALUES ( '$username', '$password', '$role')";
        $conn->query($sql);
        $conn->close();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        session_start();
        
        $username = $_POST["username"];
        $passwordRaw =  $_POST["password"];
        $password = password_hash($passwordRaw, PASSWORD_DEFAULT);
        $role = $_POST["role"];
        $_SESSION['currentstudent'] = $username;

        if( !(empty($username) ||empty( $password) || empty($role)) ){

            uploadUser($username, $password,$role);

            if($role == "teacher") header("Location: teacherPage.php");
            else header("Location: studentPage.php");
           
        }
      
        exit();
        
        
    }



?>