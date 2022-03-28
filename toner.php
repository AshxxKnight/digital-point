<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    require_once "pdo2.php";
    session_start();
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
if(isset($_SESSION["email"]))
{
if ( isset($_POST['name']) && isset($_POST['machine']) && isset($_POST['colour']) && isset($_POST['quantity'])) {
unset($_SESSION['success']);
if ( strlen($_POST['machine']) < 1 ) {
        $_SESSION['error'] = 'Missing data';
        // header("Location: add.php");
        // return;
    }

    if ( $_POST['quantity'] === 0 ) {
        $_SESSION['error'] = 'Bad data';
        // header("Location: add.php");
        // return;
    }
// Attempt insert query execution
try{
    date_default_timezone_set('Asia/Kolkata');

    $name = "'".$_POST["name"]."'";
  $machine = "'".$_POST["machine"]."'";
  $colour = "'".$_POST["colour"]."'";
  $quantity = $_POST["quantity"];
  $my_date = "'".date("Y-m-d H:i:s")."'";

   $sql = "INSERT INTO toner (name, machine, colour, quantity, date_time) VALUES ($name, $machine, $colour, $quantity, $my_date )";    
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
}
else{
    header("Location: login.php");
     $_SESSION["error"] = "You tried to access the admin page without logging in. Please log in to continue.";
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
                <link rel="stylesheet" href="Style/php_style3.css">
            </header>
            <!-- <a href="index.html"><img src="Images/cancel.png" id="cancel"></a> -->
            <div id="logout">
        <a href="logout.php" >LOG OUT</a>
        </div>
             <!-- <a href="logout.php">Log Out</a> -->
                <form method="post" class="form_container">
                    <p id="head">Toner request : </p>
                    <p>Customer Name : <input type="text" name="name" class="inp"></p>
                    <p>Machine Model No. : <input type="text" name="machine"></p>
                    <p>Colour :
                        <div class="btn">
                            <label>Cyan<input type="radio" name="colour" value="Cyan" id="clr"></label>
                            <label>Magenta<input type="radio" name="colour" value="Magenta" id="clr"></label>
                            <label>Yellow<input type="radio" name="colour" value="Yellow" id="clr"></label>
                            <label>Black<input type="radio" name="colour" value="Black" id="clr"></label><br/><br/><br/>
                        </div>
                    </p>
                    <p>Quantity : <input type="number" name="quantity" id="qnty"></p>

                <p id="submit"><input type="submit" value="Submit"></p>
                <!-- <a href="logout.php">Log Out</a> -->
        </div>


    </body>