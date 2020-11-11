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
      //INSERT INTO userprofile(gender, sexpref, bio) VALUES("male", "asdasd", "bio")


              if (isset($_POST['gender']) && isset($_POST['sexpref']) && isset($_POST['age']) && isset($_POST['bio'])  && isset($_POST['area']) )
              {
                  $_SESSION['profileCompleted'] = 1;
                  // echo $_SESSION['profileCompleted'];
                  try{
                      $sql = $conn->prepare("INSERT INTO userprofile(gender, sexpref, age, bio, area,userId) VALUES(:gender, :sexpref, :age, :bio, :area, :userId)");
                      $sql->bindParam(':gender', $_POST['gender']);
                      $sql->bindParam(':sexpref', $_POST['sexpref']);
                      $sql->bindParam(':age', $_POST['age']);
                      $sql->bindParam(':bio', $_POST['bio']);
                      $sql->bindParam(':area', $_POST['area']);
                      $sql->bindParam(':userId', $_SESSION['id']);

                      $sql->execute();
                  }catch(Exception $e)
                  {
                      echo 'Error: ' . $e->getMessage();
                  }
              }
              // echo 'yo';
              // var_dump($_SESSION['id']);
              // echo 'yo';
              
              if ($_SESSION['profileCompleted'] == 1)
              {
                  try
                  {
                        $query = $conn->prepare("UPDATE users SET profileCompleted=:profileCompleted WHERE id=:userid");
                        $query->bindParam(':profileCompleted', $_SESSION['profileCompleted']);
                        $query->bindParam(':userid', $_SESSION['id']);
                        $query->execute();
                  } catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
              }

              if (isset($_POST['food']))
              {
                try{
                    $sql = $conn->prepare("INSERT INTO interesttags(interest, userId) VALUES(:food, :userId)");
                  //   var_dump($sql);
                  //   print_r($sql.'yooooo');
                    $sql->bindParam(':food', $_POST['food']);
                    $sql->bindParam(':userId', $_SESSION['id']);
                    $sql->execute();
                }catch(Exception $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
              }

              if (isset($_POST['books']))
              {
                try{
                    $sql = $conn->prepare("INSERT INTO interesttags(interest, userId) VALUES(:books, :userId)");
                  //   var_dump($sql);
                  //   print_r($sql.'yooooo');
                    $sql->bindParam(':books', $_POST['books']);
                    $sql->bindParam(':userId', $_SESSION['id']);
                    $sql->execute();
                }catch(Exception $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
              }

              if (isset($_POST['travel']))
              {
                try{
                    $sql = $conn->prepare("INSERT INTO interesttags(interest, userId) VALUES(:travel, :userId)");
                  //   var_dump($sql);
                  //   print_r($sql.'yooooo');
                    $sql->bindParam(':travel', $_POST['travel']);
                    $sql->bindParam(':userId', $_SESSION['id']);
                    $sql->execute();
                }catch(Exception $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
              }

              if (isset($_POST['sports']))
              {
                try{
                    $sql = $conn->prepare("INSERT INTO interesttags(interest, userId) VALUES(:sports, :userId)");
                  //   var_dump($sql);
                  //   print_r($sql.'yooooo');
                    $sql->bindParam(':sports', $_POST['sports']);
                    $sql->bindParam(':userId', $_SESSION['id']);
                    $sql->execute();
                }catch(Exception $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
              }


              ////////////////////////////////////////////////////////////////////////
          
      /////////////////////////////////////////////
    
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

      