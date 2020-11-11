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

      $firstPic = 0;
          if (count($_FILES) > 0) {
      
              if (is_uploaded_file($_FILES['userImage']['tmp_name'][0])) {
                  //require_once "../Matcha-2020-master/config/database.php";
                 
                  foreach ($_FILES['userImage']['tmp_name'] as $key => $value)
                  {
                     // echo $value;
                     $imgData = addslashes(file_get_contents($value));
                     $imageProperties = getimageSize($value);
                     $sql = "INSERT INTO user_images(imageType ,imageData , users_id) VALUES('{$imageProperties['mime']}', '{$imgData}', {$_SESSION['id']})";
                     if ($firstPic == 0){
                        $sql = "INSERT INTO user_images(imageType ,imageData , users_id, profilePicture) VALUES('{$imageProperties['mime']}', '{$imgData}', {$_SESSION['id']}, 1)";
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

            if (isset($_POST['comments']) )
            {
                // echo $_SESSION['profileCompleted'];
                try{
                    $sql = $conn->prepare("INSERT INTO comments(comments, `user_id`) VALUES(:gender, `user_id`)");
                    $sql->bindParam(':comments', $_POST['comments']);
                    $sql->bindParam(':user_id', $_POST['id']);
                    $sql->execute();
                }catch(Exception $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
            }