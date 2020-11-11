<?php 

    
$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'matcha2';


//connect to the database
try {
    $db = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
    //Delete Database
    $user = "DROP DATABASE IF EXISTS ". $DB_NAME;
    try {
        $conn->exec($user);
        echo "Deleted database successfully <br>";
        echo "why are you not printing?????";
    } catch (PDOException $e) {
        echo "error: " . $user . "<br>" . $e->getMessage();
    }
    $conn = null;