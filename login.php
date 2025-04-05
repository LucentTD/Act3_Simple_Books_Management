<?php 
    include "server.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $username = $_POST["username"];
        $passwordRaw =  $_POST["password"];  

        if( !(findUser($username) && verifyPassword($username, $passwordRaw)) ){
           
            header("Location: main.php");            
            exit();
        }
       
        else{

            $_SESSION['currentstudent'] = $username;
            $role = getRole($username);
   
            if($role == "teacher") header("Location: teacherPage.php");
            else header("Location: studentPage.php");

        }
          
        exit(); 
        
    }


?>