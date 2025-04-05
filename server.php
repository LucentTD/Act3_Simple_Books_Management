<?php
    $db_server = "127.0.0.1";
    $db_user = "root";
    $db_pass = "";
    $db_name = "booksdb";
    $conn;
   
    function initSql(){
        global $conn, $db_server,$db_user, $db_pass, $db_name;
        try{
            $conn = new mysqli($db_server,$db_user, $db_pass, $db_name); 
        }
        catch(mysqli_sql_exception){
            echo "Cannot connecting in database";
        }
    }
    

   

    function findUser($username) {
        initSql();
        global $conn;

        $statement = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();

        return $result->num_rows > 0;  // Return true if user is found, false otherwise
    }

    function verifyPassword($username, $password) {
        initSql();
        global $conn;

        $statement = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Compare the stored hashed password with the entered password
            return password_verify($password, $row['password']);
        } else {
            return false;
        }
    }

    function getRole($username){
        initSql();
        global $conn;

        $result = $conn->query("SELECT role FROM users WHERE username = '$username'");
        $data = $result->fetch_assoc();
        $conn->close();

        return $data['role'];
    }
    
    function getAllBooks(){
        initSql();
        global $conn;
        $result = $conn->query('select * FROM books');
        $data = [];

       
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
          
        }

        $conn->close();

        return $data;

    }

    function getAllAssigned(){
        initSql();
        global $conn;
        $result = $conn->query('SELECT books.title, users.username FROM assignments join books on books.book_id = assignments.book_id join users on users.user_id = assignments.user_id;');
        $data = [];                             
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
            
        }              
        $conn->close();

        return $data;           

    }
    function getStudentAssigned($student){
        initSql();
        global $conn;
        $result = $conn->query("SELECT books.title from assignments join users on users.user_id = assignments.user_id join books on books.book_id = assignments.book_id where  users.username = '$student';");
        $data = [];                             
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
            
        }              
        $conn->close();

        return $data;    
    }
 
?>