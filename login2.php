<?php
    require_once "pdo1.php";

   
    session_start();
    if ( isset($_POST['loginid']) && isset($_POST['password'])  )
    {
        unset($_SESSION["loginid"]);  

        
    $e = $_POST['loginid'];
    $p = hash('md5',$_POST['password']);

    $sql = "SELECT name FROM users WHERE name = '$e' AND password = '$p'";

    echo "<p>$sql</p>\n";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);

   if ( $row === FALSE ) {
      echo "<h1>Login incorrect.</h1>\n";
       $_SESSION["error"] = "Incorrect password.";
            header( 'Location: login2.php' ) ;
            return;
   } else { 

    // $_SESSION["loginid"] = $_POST["loginid"];
            $_SESSION["success"] = "Logged in.";
            $_SESSION["user"] = $_POST['loginid'];
      header("Location: admin.php");
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
            <h1 id="head">Admin Login</h1>
            <form method="post">
                <p>Login ID : 
                    <input type="text" size="40" name="loginid">
                </p>
                <p>Password :
                   <input type="password" size="40" name="password">
                </p>
                <p id="submit"><input type="submit" value="Login" id="login">
                </p>
                
            </form>
        </div>


    </body>