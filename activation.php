<?php

$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'matcha2';
//connect to the newly created database
try {
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
///insert record into views + 1popularity
try{
  $sql = $conn->prepare(" INSERT IGNORE INTO viewstats (user1,user2) VALUES (:userID,:viewersID)");
  $sql->bindParam(':userID', $_GET['uid']);
  $sql->bindParam(':viewersID', $_SESSION['id']);

  $sql->execute();
}catch(Exception $e)
{
  echo 'Error: ' . $e->getMessage();
}

if(isset($_GET['activate']) && !empty($_GET['activate'])){

$has = $_GET['activate'];
try{
    $sql = $conn->prepare("UPDATE users SET isActive = 1 WHERE token='$has'");
    $sql->execute();
}catch(Exception $e)
{
    echo 'Error: ' . $e->getMessage();
}

}


?>