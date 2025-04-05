<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style> 

#addCabinet form{
    width: 300px;
    display: flex;
    flex-direction: column;
}
.bookpack{
    display: flex;
    flex-direction: column;
}

.assignlist{
    display: flex;
    flex-direction: column;
}
.assignpack{
    display: flex;
    flex-direction: row;
}

.toprow{
    background-color: lightgoldenrodyellow;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.botrow{
    background-color: lightcyan;
    display: flex;
    flex-direction: row;
    justify-content: space-around;

}

#addBook form{
    display: flex;
    flex-direction: column;
}

img{
    max-height: 200px;
    max-width: 200px;
}

.bookpack{
    display: flex;
    flex-direction: column;
    align-items: center;
    border: black solid 2px;
    padding: 1px;
}
</style>

<body>
    <h1>Teacher Dashboard</h1>
    <?php 
    
        session_start();
        $current = $_SESSION['currentstudent'];
        echo "<h2 class='welcombanner'>". "Welcome back, $current". "</h2>";

    
    ?>
    <div class="toprow">
        <div id="addCabinet">
            <h2>Add Book to Cabinet</h2>
            <form action="addBook.php" method="POST">
                <label for="">Book Name</label>
                <input type="text" name="bookname">
                <label for="">Book Description</label>
                <input type="text" name="bookdesc">
                <label for="">Image Source</label>
                <input type="text" name="bookimg">
                <button>Add Book</button>
            </form>
        </div>

        <div id="listCabinet">
            <?PHP 
                include "server.php";
                $booklist = getAllBooks();
                foreach($booklist as $book){
                    echo "<div class='bookpack'>";
                    echo "<img src='" . $book['cover_image'] . "' alt='Book Cover'>";
                    echo "<span>". $book['title'] ."</span>";
                    echo "<span>". $book['description'] ."</span>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    
    <div class="botrow">
        <div id="addBook">
            <h2>Assign to a Student</h2>
            <form action="assign.php" method="POST">
                <label for="">Book Name</label>
                <input type="text" name="bookname">
                <label for="">Student</label>
                <input type="text" name="student">
                <button>Assign</button>
            </form>
        </div>

        <div id="assignlist">
            <h3>List of all asigned</h3>
            <span ><b>Student --- Book</b></span>
            <?PHP 
                $assign = getAllAssigned();
                foreach($assign as $a){
                    echo "<div class='assignpack'>";
                
                    echo "<span>". $a['username'] ."</span>";
                    echo " --- ";
                    echo "<span>". $a['title'] ."</span>";
                    echo "</div>";
                }
                
            ?>
        </div>
    </div>

    
    <a href="main.php">Logout</button>
</body>
</html>