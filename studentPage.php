<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>

</style>
<body>
    <h1>Student Dashboard</h1>
    

    <?php 
    include "server.php";
    session_start();
    $current = $_SESSION['currentstudent'];
    echo "<h2 class='welcombanner'>". "Welcome back, $current". "</h2>";
    $books = getStudentAssigned( $current);
    

    echo"<div>";
    echo "<h4> List of Assigned Books</h4>";
    foreach($books as $b){
        echo "<span>". $b['title']."</span>";
    }
    echo"</div>";
    
    ?>

<a href="main.php">Logout</button>
</body>
</html>