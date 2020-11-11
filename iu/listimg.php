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

   //require_once "../Matcha-2020-master/config/database.php";
    $logged_user;

    $sql = "SELECT * FROM user_images ORDER BY img_id DESC"; 
    //$result = mysqli_query($conn, $sql);
    
    try{
        $img = $conn->prepare($sql);
        $img->execute();
    }
    catch(Exception $e){
        echo 'Error: ' . $e->getMessage();
    }
?>

<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<!-- <link href="imageStyles.css" rel="stylesheet" type="text/css" /> -->
</HEAD>
<BODY>
<?php

    $imgArray = $img->fetchAll();
    var_dump($img->fetchAll(PDO::FETCH_ASSOC));
    foreach ($imgArray as $key => $value) {
      //  echo $value;
      
       echo'<img src="data:image/jpeg;base64,'.base64_encode($value['imageData']).' "/>';
    //    echo base64_encode($value['imageData']);
    }
	//while($img->fetch()) {
	?>
		 <!-- <img src="imgview.php?img_id=<?php /* echo $img["img_Id"];*/ ?>" /><br/> -->
	
<?php		
?>
</BODY>
</HTML>