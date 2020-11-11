
<?php
session_start();

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
    $online = 0;

        try{
            $sql = $conn->prepare("UPDATE users SET onlineStatus=:onlineStatus, lastLogin=:lastLogin WHERE id=:userid");

            $sql->bindParam(':onlineStatus', $online);
            $sql->bindParam(':lastLogin', date("Y/m/d"));
            $sql->bindParam(':userid', $_SESSION['id']);
            $sql->execute();
        }catch(Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }

// var_dump($_SESSION);
session_destroy();
// var_dump($_SESSION);
header("Location:index.php");
?>