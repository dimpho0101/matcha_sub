<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mat\materialize\css\mat.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css\style.css">
</head>
<body>
<?php 

include './includes/header.php';

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

      $picture = 0;
$q = "SELECT * FROM user_images WHERE users_id={$_SESSION['id']} AND profilePicture = 1 ";
        $z = $conn->prepare($q);
        $z->execute();
        $img_array = $z->fetchAll();
        foreach($img_array as $key => $value)
        {
            echo '<div class="gallery">';
            echo '<form action="homefunc.php" enctype="multipart/form-data" method="post">';
            echo'<img id="main" height="300px" width="300px" src="data:image/jpeg;base64,'.base64_encode($value['imageData']).' "/> <br><br>';
            echo '<button class="waves-effect black btn" type="submit">Like</button> <br><br>';
            echo '<input id="main" type="text" name="comments" placeholder="Write a comment"value="" maxlength="500"> <br>';
            echo '<button  class="waves-effect black btn" type="submit">Save Comment</button> <br><br>';
            echo '</div>';
        }
            // $picture++;
?>

<div class="center-align" style="text-align:center;margin-top:20%">
    <form action="homefunc.php" name="gallery" enctype="multipart/form-data" method="post">
    <input name="userImage[]" type="file" class="inputFile" required/>
    <br><br>
    <button class="waves-effect black btn" type="submit">Save Image</button>
    </form>
    </div>
</body>
</html>

  