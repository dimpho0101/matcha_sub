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



$firstPic = 0;
          if (count($_FILES) > 0) {
      
var_dump($_FILES);
           
              if (is_uploaded_file($_FILES['userImage']['tmp_name'][0])) {
                  //require_once "../Matcha-2020-master/config/database.php";
                 
                  foreach ($_FILES['userImage']['tmp_name'] as $key => $value)
                  {
                     // echo $value;
                     $imgData = addslashes(file_get_contents($value));
                     $imageProperties = getimageSize($value);
                     $sql = "INSERT INTO user_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}'";
                     if ($firstPic == 0){
                        $sql = "INSERT INTO user_images(imageType ,imageData, profilePicture) VALUES('{$imageProperties['mime']}', '{$imgData}', 1)";
                         $firstPic++;
                    } 
                     //  $sql = "INSERT INTO user_images(imageType ,imageData , users_id) VALUES('{$imageProperties['mime']}', '{$imgData}', {$_SESSION['id']})";
                       try{
                        $current_id = $conn->prepare($sql);
                        $current_id->execute();
                        header("Location: home.php");
                    } catch (Exception $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                  }
                }
            }
?>