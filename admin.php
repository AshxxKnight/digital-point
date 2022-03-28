<?php
require_once "pdo2.php";
session_start();
if(isset($_SESSION["user"]))
{
    $sql1 = "SELECT * FROM users";
    $sql2 = "SELECT * FROM toner";
    echo"<p>Registered Users :</p>";
    echo '<table border="1">'."\n";
echo "<tr><td>";
    echo('user_id');
    echo("</td><td>");

    echo('name');
    echo("</td><td>");
    echo('mobile');
    echo("</td><td>");
    echo('email');
    echo("</td></tr>\n\n\n");
$stmt1 = $pdo->query($sql1);
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
// echo '<table border="1">'."\n";
foreach ( $rows1 as $row1 ) {
    echo "<tr><td>";
    echo($row1['user_id']);
    echo("</td><td>");
   
    echo($row1['name']);
    echo("</td><td>");
    echo($row1['mobile']);
    echo("</td><td>");
    echo($row1['email']);
    echo("</td></tr>\n");
}
echo "</table>\n";
echo "<pre><br></pre>";





echo"<p>Toner Requests :</p>";
$stmt2 = $pdo->query($sql2);
$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
echo '<table border="1">'."\n";
echo "<tr><td>";
    echo('req_id');
    echo("</td><td>");
    echo('Time Stamp');
    echo("</td><td>");
    echo('name');
    echo("</td><td>");
    echo('machine');
    echo("</td><td>");
    echo('colour');
    echo("</td><td>");
    echo('quantity');
    echo("</td></tr>\n");
foreach ( $rows2 as $row2 ) {
    echo "<tr><td>";
    echo($row2['req_id']);
    echo("</td><td>");
     echo($row2['date_time']);
    echo("</td><td>");
    echo($row2['name']);
    echo("</td><td>");
    echo($row2['machine']);
    echo("</td><td>");
    echo($row2['colour']);
    echo("</td><td>");
    echo($row2['quantity']);
    echo("</td></tr>\n");
}
echo "</table>\n";
}
else{
    header("Location: login2.php");
     $_SESSION["error"] = "You tried to access the admin page without logging in. Please log in to continue.";
}
echo('<p>Please <a href="logout.php">Log Out</a> when you are done.</p>');
?>

    