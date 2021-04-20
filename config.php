<?php

$username = "";
$email    = "";
$pgerrors = array(); 
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Database');
 
/* Attempt to connect to MySQL database */
$Database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


 
// REGISTER USER
if (isset($_POST['submit'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($Database, $_POST['username']);
    $email = mysqli_real_escape_string($Database, $_POST['email']);
    $password = mysqli_real_escape_string($Database, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($Database, $_POST['confirm_password']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $pgerrors array
    if (empty($username)) { array_push($pgerrors, "Username is required"); }
    if (empty($email)) { array_push($pgerrors, "Email is required"); }
    if (empty($password)) { array_push($pgerrors, "Password is required"); }
    if ($password != $confirm_password) {
      array_push($pgerrors, "The two passwords do not match");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_sql = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($Database, $user_check_sql);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($pgerrors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($pgerrors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($pgerrors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $sql = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($Database, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: welcome.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($Database, $_POST['email']);
    $password = mysqli_real_escape_string($Database, $_POST['password']);
  
    
  
    if (count($pgerrors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($Database, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: welcome.php');
        }
        else {
            array_push($pgerrors, "Wrong email/password ");
        }
    }
}
?>