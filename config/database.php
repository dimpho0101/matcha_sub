<?php
    header("Access-Control-Allow-Origin: *");

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

    //create Database
    try{
        $sql = "CREATE DATABASE IF NOT EXISTS ".$DB_NAME;
        $db->exec($sql);
        echo "database successfully created";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }