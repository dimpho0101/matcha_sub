<?php
    session_start();
    $DB_DSN = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD =''; 
    $DB_NAME = 'matcha2';

    try {
        $conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    switch($_REQUEST['action']){
        case "sendMessage":

            // echo 'sending...';
            // $q = $conn->prepare("INSERT INTO chat SET message=?");
            // $q->execute([$_REQUEST['message']]);
            
            echo 'sending response back';
        break;
    }


?>