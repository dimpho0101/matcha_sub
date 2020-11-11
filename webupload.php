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

    

    $newimgname = rand(1,100);
    $user_id = $_SESSION['id'];


  ////////////////
  $data = explode( ',', $_POST["img64"] );
    $test = base64_decode($data[1]);
    
    file_put_contents("img/gal/".$user_id."$".$newimgname.".png", $test);
    $dest= imagecreatefrompng("img/gal/".$user_id."$".$newimgname.".png");
/* echo "OK<img src=";
echo "img/gal/".$user_id."$".$newimgname.".png>"; */
    if(!empty($_POST["emoji64"]))
    {
        $emo = explode ('matcha_sub/',$_POST["emoji64"]);  
       
        // die();
        // exit(); 
        $src = imagecreatefrompng($emo[1]);
        $width = ImageSx($src);
        $height = ImageSy($src);
        pic_position($emo);
        ImageCopyResampled($dest,$src,$pos2,$pos1,0,0,$x,$y,$width,$height);
    }
    
    if(!empty($_POST["emoji64_2"]))
    {
        $emo2 = explode ('matcha_sub/',$_POST["emoji64_2"]);
        $src = imagecreatefrompng($emo2[1]);
        var_dump($emo2[0]);
        $width = ImageSx($src);
        $height = ImageSy($src);
        pic_position($emo2);
        ImageCopyResampled($dest,$src,$pos2,$pos1,0,0,$x,$y,$width,$height);
    }
    
    imagepng($dest, "img/gal/".$user_id."$".$newimgname.".png");

        try { 
      
          $sql = "INSERT INTO user_images (imageData, users_id) VALUES (:pic, :usid)";
          $stmt= $conn->prepare($sql);
          $stmt->bindParam(':usid', $user_id);
          $picname = $user_id."$".$newimgname.".png";
          $stmt->bindParam(':pic', $picname);
      
          if($stmt->execute()){
              header("Location: snap.php");
          }

         
       } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
       }  


       ////picPos switch
       function pic_position($emo)
    {
        global $x, $y, $width, $height, $pos1, $pos2;

        switch ($emo[1])
        {
            case "emojis/1.png" :
                $pos1 = 10;
                $pos2 = 10;
                $x = $width/5; $y = $height/5;
                break;
            case "emojis/2.png" :
                $pos1 = 10;
                $pos2 = 200;
                $x = $width/5; $y = $height/5;
                break;
            case "emojis/3.png" :
                $pos1 = 10;
                $pos2 = 400;
                $x = $width/5; $y = $height/5;
                break;
            case "emojis/4.jpg" :
                $pos1 = 100;
                $pos2 = 10;
                $x = $width/5; $y = $height/5;
                break;
        }
    }
   
   ?>
