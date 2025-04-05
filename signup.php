<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style> 

    #contain{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #signuppanel{
        
        width: 50%;
        display: flex;
        flex-direction: column;
    }

    a{
        text-decoration: none;
    }

</style>

<body>
    <div id="contain">
        <h2>BOOKS</h2>
        <h3>Sign UP</h3>
        <form action="addUser.php" id="signuppanel" method="POST">
            <label for="un">Username</label>
            <input type="text" id="un" name="username">
            <label for="">Password</label>
            <input type="password" name="password">
            <label for="">Role</label>
            <div>
                <label for="student">Student</label>
                <input type="radio" name="role" value="student" id="student">
                <label for="teacher">Teacher</label>
                <input type="radio" name="role" value="teacher"id="teacher">

            </div>

            <button>Create</button>
        </form>
       
    </div>
    
   
</body>
</html>

