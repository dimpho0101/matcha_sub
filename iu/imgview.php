<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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


    if(isset($_GET['img_id'])) {
        $sql = "SELECT imageType,imageData FROM user_images WHERE img_id=".$_GET['img_id'];
	//	$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        try{
            $img = $conn->prepare($sql);
            $img->execute();
        //    print_r($imageData);
            header("Content-type: " . $img["imageType"]);
            echo base64_encode($img["imageData"]);

        } catch (Exception $e)
        {
            echo 'Error ' . $e->getMessage();
        }

        //echo $row["imageData"];
	}
?>