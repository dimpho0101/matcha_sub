<div class="topnav">
  <a href="./index.php">Sign up</a>
  <a href="./login.php">Log in</a>
</div>

<?php
   

session_start();
$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'matcha2';
//connect to the newly created database
try {
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    $sql = file_get_contents('matcha2.sql');
    $qr = $conn->exec($sql);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

