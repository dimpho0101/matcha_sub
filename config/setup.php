<?php 
    
    $DB_DSN = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD =''; 
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

    
    //create tables for users
    $user = "CREATE TABLE IF NOT EXISTS users ("
    . "id int NOT NULL AUTO_INCREMENT,"
    . "username varchar(100) NOT NULL UNIQUE,"
    . "firstname varchar(100) NOT NULL UNIQUE,"
    . "lastname varchar(100) NOT NULL UNIQUE,"
    . "email varchar(100) NOT NULL UNIQUE,"
    . "password varchar(100) NOT NULL,"
    . "token varchar(100) NOT NULL,"
    . "notify varchar(100) NOT NULL DEFAULT 1,"
    . "isActive varchar(100) NOT NULL DEFAULT 0,"
    // . "dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,"
    . "PRIMARY KEY (id));";
    try {
        $conn->exec($user);
        echo "Users table created successfully <br>";
    } catch (PDOException $e) {
        echo "error: " . $user . "<br>" . $e->getMessage();
    }

    $user = "CREATE TABLE IF NOT EXISTS user_images ("
    . "img_id int(10) NOT NULL AUTO_INCREMENT,"
    . "imageType varchar(255) NOT NULL UNIQUE,"
    . "imageData mediumblob NOT NULL UNIQUE,"
    . "users_id int(11) NOT NULL UNIQUE,"
    . "profilePicture int(11) NOT NULL UNIQUE,"
    . "PRIMARY KEY (img_id)),";

    try {
        $conn->exec($user);
        echo "Users table created successfully <br>";
    } catch (PDOException $e) {
        echo "error: " . $user . "<br>" . $e->getMessage();
    }
    

  