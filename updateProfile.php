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
        

        $q = "SELECT * FROM user_images WHERE users_id={$_SESSION['id']} AND profilePicture = 1 LIMIT 1";
        $z = $conn->prepare($q);
        $z->execute();
        $row = $z->fetch();
        echo'<img height="300px" width="300px" src="data:image/jpeg;base64,'.base64_encode($row['imageData']).' "/><br><br>';
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
?>
        <label>Update your profile</label><br>
            <select name="gender">
            <option value="" >--Please choose your gender--</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
            </select><br>
            <select name="sexpref">
            <option  value="">--Please choose your sexual orientation--</option>
            <option value="straight">Straight</option>
            <option value="gay">Gay</option>
            <option value="bisexual">Bisexual</option>
            </select><br>
            <input type="text" name="age" min="18" placeholder="Please enter your age"> <br>
            <select name="area">
            <option  value="">--Please choose your location--</option>
            <option value="marshalltown">marshalltown</option>
            <option value="sandton">sandton</option>
            <option value="rosebank">rosebank</option>
            <option value="soweto">soweto</option>
            </select><br>
            <input id="main" type="text" name="bio" placeholder="Short bio about you :)"value="" maxlength="500"> <br>
            <button type="submit">Submit</button>
        </form>
</body>
</html>