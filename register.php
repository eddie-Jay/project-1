<?php include("config.php")

?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css" />
    <head>
        <title>Student Registration</title>
    </head>
    <body>

        <form action="register.php" method="post" class= "tform">
            <?php include('errorpg.php')?>
            <h1>student registration</h1>
            <div class ="form-group">
                <label for='username'>Username</label><br>
                <input type="text" name="username" class ="form control" required>
            </div>
        
            <div class ="form-group">
                <label for='email'>Email</label><br>
                <input type="email" name="email" class ="form control" required>
            </div>
            
            <div class ="form-group">
                <label for='password'>Password</label><br>
                <input type="password" name="password" class ="form control" required>
            </div>
            
            <div class ="form-group">
                <label for='confirm password'> Confirm Password</label><br>
                <input type="password" name="confirm_password" class ="form control" required>
            </div>

            <div class ="float">
                <button type="submit" class="btn" name="submit" >Register</button>
            </div>
            <p>Already have an account,<a href="login.php"> log in</a></p>
        </form>
        
    </body>
</html>