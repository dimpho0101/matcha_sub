<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
      session_start();
      $DB_DSN = 'localhost';
      $DB_USER = 'root';
      $DB_PASSWORD = '';
      $DB_NAME = 'Matcha';
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
    
                // var_dump($_SESSION['id']);
                if (isset($_POST['gender']) && !empty($_POST['gender']))
                {
                    try{
                        $sql = $conn->prepare("UPDATE userprofile SET gender=:gender WHERE userId=:userid");
  
                        $sql->bindParam(':gender', $_POST['gender']);
                        $sql->bindParam(':userid', $_SESSION['id']);
                        $sql->execute();
                    }catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
                }

                if (isset($_POST['sexpref']) && !empty($_POST['sexpref']))
                {
                    try{
                        $sql = $conn->prepare("UPDATE userprofile SET sexpref=:sexpref WHERE userId=:userid");
  
                        $sql->bindParam(':sexpref', $_POST['sexpref']);
                        $sql->bindParam(':userid', $_SESSION['id']);
                        $sql->execute();
                    }catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
                }
                
                if (isset($_POST['bio']) && !empty($_POST['bio']))
                {
                    try{
                        $sql = $conn->prepare("UPDATE userprofile SET bio=:bio WHERE userId=:userid");
  
                        $sql->bindParam(':bio', $_POST['bio']);
                        $sql->bindParam(':userid', $_SESSION['id']);
                        $sql->execute();
                    }catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
                }

                if (isset($_POST['area']) && !empty($_POST['area']))
                {
                    try{
                        $sql = $conn->prepare("UPDATE userprofile SET area=:area WHERE userId=:userid");
  
                        $sql->bindParam(':area', $_POST['area']);
                        $sql->bindParam(':userid', $_SESSION['id']);
                        $sql->execute();
                    }catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
                }

                if (isset($_POST['age']) && !empty($_POST['age']))
                {
                    try{
                        $sql = $conn->prepare("UPDATE userprofile SET age=:age WHERE userId=:userid");
  
                        $sql->bindParam(':age', $_POST['age']);
                        $sql->bindParam(':userid', $_SESSION['id']);
                        $sql->execute();
                    }catch(Exception $e)
                    {
                        echo 'Error: ' . $e->getMessage();
                    }
                }
                //interests
              header("Location: home.php");  
?>

<!-- select * from users join interestTags on users.id =  interestTags.userId Where interestTags.interest IN('travel', 'food') -->

<!-- SELECT * FROM `likes` WHERE user1 IN(10, 9) AND user2 IN (9, 10) -->