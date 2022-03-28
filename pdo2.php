
<?php
$pdo = new PDO("mysql:host=localhost;dbname=customers", "user2", "a1");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
