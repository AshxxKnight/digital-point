<?php
    require_once "pdo2.php";

   
    session_start();
    if ( isset($_POST['email']) && isset($_POST['password'])  )
    {
        unset($_SESSION["email"]);  

    // $_SESSION['email']=$_POST['email'];
    $e = $_POST['email'];
    // $p = $_POST['password'];
    $p = hash('md5',$_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$e' AND password = '$p'";

    echo "<p>$sql</p>\n";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);

   if ( $row === FALSE ) {
       $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login.php' ) ;
            return;
   } else { 

    $_SESSION["email"] = $_POST["email"];
            $_SESSION["success"] = "Logged in.";
            $_SESSION["email"] = $_POST["email"];
      header("Location: page1.php");
      return;
   }
       // echo("<p>Please <a href="logout.php">Log Out</a> when you are done.</p>");
    }
?>
       
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <title>DIGITAL POINT</title>
    </head>
    <body>
        <header>
            <link rel="stylesheet" href="Style/php_style.css">
        </header>
            <a href="index.html"><img src="Images/cancel.png" id="cancel"></a>
        
            <?php
                if ( isset($_SESSION["error"]) ) 
                {
                    echo('<p style="color:red; font-size: 150%; margin-left: 45%; padding-bottom: 5px;">'.$_SESSION["error"]."</p>\n");
                    unset($_SESSION["error"]);
                }
            ?>
            <div class="form_container">
                <h1 id="head">User Login</h1>
                <form method="post">
                    <p>Email :    
                        <input type="text" name="email" id="email">
                    </p>
                    <p>Password :
                        <input type="password" name="password">
                    </p>
                    <p id="submit"><input type="submit" value="Login" id="login">
                    </p>
                   
                </form>
               
            </div>
             <a href="new_user.php" class="link">Register new user</a>
            <a href="login2.php" class="link" id='A1'>Admin Login</a>



</body>