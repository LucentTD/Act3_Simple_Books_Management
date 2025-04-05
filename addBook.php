<?php 
    include "server.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["bookname"];
        $desc = $_POST["bookdesc"];
        $img = $_POST["bookimg"];
     
        initSql();
        global $conn;
        $sql = "insert into books (title, description, cover_image) VALUES ('$name', '$desc', '$img')";
        $conn->query($sql);
        $conn->close();
        header("Location: teacherPage.php");
        
    }



?>