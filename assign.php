<?php 
    include "server.php";

    function getBookId($book){
        initSql();
        global $conn;
        $sql = "select book_id from books where title = '$book'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $conn->close();
        return $data['book_id'];
    }

    function getUserId($user){
        initSql();
        global $conn;
        $sql = "select user_id from users where username = '$user'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        
        $conn->close();
        return $data['user_id'];
    }

    function checkDuplicate($bookID, $studentID){
        initSql();
        global $conn;
        $sql = "select * from assignments where user_id = $studentID && book_id = $bookID";
        $result = $conn->query($sql);

        $duplicate = false;
        while($row = $result->fetch_assoc()) {
           $duplicate = true;
        }
        
        return $duplicate;

    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $book = $_POST["bookname"];
        $student =  $_POST["student"];
       
        $bookID = getBookId($book);
        $studentID = getUserId($student);
        if(!checkDuplicate($bookID,$studentID)){
            initSql();
            global $conn;
            $sql = "insert into assignments (book_id, user_id) VALUES ('$bookID', '$studentID')";
            $conn->query($sql);
            $conn->close();
              


        }
        header("Location: teacherPage.php"); 
        exit();
           
    }



?>