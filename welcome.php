<?php
//Start the session
session_start();

if (isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css" />
    <head>
        <title>Welcome </title>
    </head>
    <body>
	
</div> 
<h1>Welcome Student</h1>
    <div>       
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div>
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
         <p><a href="login.php"><button>logout</button></a></p>
    </div>
    </body>
</html>