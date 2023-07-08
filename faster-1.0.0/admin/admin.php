<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location:file.php");
    exit;
}

// Check if the form is submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    // Validate the login credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace the condition below with your own authentication logic
    if($username === 'admin' && $password === 'password'){
        // Authentication success, create a session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: file.php");
        exit;
    } else {
        // Authentication failed
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        form { 
  max-width: 400px;
  margin: 0 auto;
}

form input[type="text"],
form input[type="password"],
form input[type="submit"] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
}

/* Responsive Styles */
@media screen and (max-width: 600px) {
  form {
    max-width: 300px;
  }
}

    </style>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
