<?php
session_start();
$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'Matcha';
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
    // INSERT IGNORE INTO viewstats (user1,user2) VALUES (9,10)

    try{
        $sql = $conn->prepare(" INSERT IGNORE INTO likes (user1,user2) VALUES (:userID,:viewersID)");

        $sql->bindParam(':viewersID', $_GET['uid']);
        $sql->bindParam(':userID', $_SESSION['id']);

        $sql->execute();
        header('Location: history.php');
    }catch(Exception $e)
    {
        echo 'Error: ' . $e->getMessage();
    }

?>