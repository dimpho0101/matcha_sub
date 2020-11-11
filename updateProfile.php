<?php
    include './includes/header.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="updateProfileFunctions.php" name="profile" enctype="multipart/form-data" method="post">
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
        

        $q = "SELECT * FROM user_images WHERE users_id={$_SESSION['id']} AND profilePicture = 1 LIMIT 1";
        $z = $conn->prepare($q);
        $z->execute();
        $row = $z->fetch();
        echo'<img height="300px" width="300px" src="data:image/jpeg;base64,'.base64_encode($row['imageData']).' "/><br><br>';
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
?>
        <h5>Update your profile</h5><br>
        <form action="updateProfileFunctions.php" enctype="multipart/form-data" method="post">
            <input type="text" name="username" maxlength="25" placeholder="Change your username"> <br>
            <input type="password" name="pass" placeholder="Change your password"> <br>
            <input  type="text" name="email" placeholder="Change your email"> <br>
            <div class="input-field col s12">
            <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            </select>
            </div>
            <br><br>
            <button class="waves-effect black btn" type="submit">Submit</button>
        </form>
</body>
</html>