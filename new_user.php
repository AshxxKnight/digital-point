<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    require_once "pdo2.php";
    session_start();
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red" id="error">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

 unset($_SESSION['success']);
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['password'])) {

if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: new_user.php");
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: new_user.php");
        return;
    }
// Attempt insert query execution
try{
  $name = "'".$_POST["name"]."'";
  $email = "'".$_POST["email"]."'";
  $mobile = "'".$_POST["mobile"]."'";
  $password = "'".hash('md5',$_POST['password'])."'";
   $sql = "INSERT INTO users (name, email, mobile, password) VALUES ($name, $email, $mobile, $password )";    
    $pdo->exec($sql);
    $_SESSION['success'] = 'Record Added';
    // echo "Records inserted successfully.";

if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}


if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 }

// Close connection

?>
<!DOCTYPE html> 
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial scale=1">
            <title>Digital Point</title>
        </head>
        <body>
            <header>
                 <link rel="stylesheet" href="Style/php_style.css">
                 <link rel="stylesheet" href="Style/php_style2.css">
            </header>
            <a href="index.html"><img src="Images/cancel.png" id="cancel"></a>
            <div class="form_container">
        <h1 id="head">Add A New User</h1>
        <form method="post">
        <p>Name:
        <input type="text" name="name" id="name"></p>
        <p>Email:
        <input type="text" name="email" id="email"></p>
        <p>Mobile:
        <input type="text" name="mobile" pattern="[0-9]{10}" id="mobile"></p>
        <p>Password:
        <input type="password" name="password" id="pass"></p>
        <p><input type="submit" value="Add New User" id="new_user"></p>
        
        </form>
    </div>
</body>