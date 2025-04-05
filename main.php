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

    #loginpanel{
        
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
        <form action="login.php" id="loginpanel" method="POST">
            <label for="un">Username</label>
            <input type="text" id="un" name="username">
            <label for="">Password</label>
            <input type="password" name="password">
            <button>Login</button>
        </form>
        <div>
            <a href="signup.php">No Account? Sign In</a>
        </div>
    </div>
    
   
</body>
</html>

