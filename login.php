<?php include('config.php')?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css" />
    <head>
        <title>Student Login</title>
    </head>
    <body>

    

        <form action=""method="post" class= "tform">
        <?php include('errorpg.php'); ?>
        <h1>Student Login</h1>
        <p>Please enter your email and password to login</p>
           <div class ="form-group">
                <label for='email'>Email</label>
                <input type="email" name="email" class ="form control" required>
            </div>
            
            <div class ="form-group">
                <label for='password'>Password</label>
                <input type="password" name="password" class ="form control" required>
            </div>
            
            <div class ="form-group">
            <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>Don't have an account,<a href="register.php"> Register here</a></p>
        </form>
    </body>
</html>
