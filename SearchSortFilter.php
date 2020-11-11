<?php

ini_set('display_errors',1);error_reporting(E_ALL);
include './includes/header.php';


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
$stmt = $conn->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId WHERE users.id ={$_SESSION['id']}");

//////////////////////////////////////////
///paste this on everypage thatsvisible when logged in
if(!isset($_SESSION['id'])){
    header("Location: login.php?notloggedin");
}

if($row = $stmt->fetch()){
    $_SESSION['area'] =$row['area'];
    $_SESSION['sexpref'] = $row['sexpref'];
    $_SESSION['gender'] = $row['gender'];
}

/////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="hacker-list">
<input class="search" />
  <span class="sort" data-sort="name">Sort by name</span>
  <span class="sort" data-sort="city">Sort by area</span>
  <span class="sort" data-sort="age">Sort by age</span>
  <span class="sort" data-sort="gender">Sort by gender</span>
  <span class="sort" data-sort="sexpref">Sort by sexpref</span>
  <span class="sort" data-sort="interest">Sort by interest</span>
  <br>
  <br>
  <form>
  <input id="minage" name="min" placeholder="18" min="18" type="number">
  <br>
   <input id="maxage" name="max"  type="number" placeholder="100" max="100">
    <button id="filterbtn" >filter</button>

  </form>

  
  
  <ul class="list">
      <?php
      $rangeString;
      $min =18;;
      $max = 100;
      $area =$_SESSION['area'];
      
      $interest_params;// =  "'travel','sports','food','books'";





      if(isset($_GET['min']) || isset($_GET['max'])){
          if(!empty($_GET['min'])){
              $min = $_GET['min'];
          }
          if(!empty($_GET['max'])){
            $max =  $_GET['max'];
        }
      }
    //  $userprofiles = $dbh->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId JOIN interestTags on users.id = interesttags.userID WHERE interestTags.interest IN('travel')")->fetch();
      $stmt = $conn->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId JOIN interestTags on users.id = interesttags.userID WHERE interestTags.interest IN('travel','sports','food','books') AND AGE BETWEEN $min AND $max  AND userprofile.area = '$area' AND users.id NOT IN ({$_SESSION['id']})");//  AND userprofile.area = '$area' AND users.id NOT IN ({$_SESSION['id']})");
      $skipthisID = 0;
      

      //make sure they in the same area
      //$_SESSION['area']
      while ($row = $stmt->fetch()) {
          if($row['id'] == $_SESSION['id']){
              $_SESSION['sexpref'] =  $row['sexpref'];
              $_SESSION['gender'] =  $row['gender'];
              continue;
          }

          if($skipthisID == $row['id'] /*|| $_SESSION['id'] == $row['id']*/){
              continue;   
          }

          ////gender and preference skips
        //   if($_SESSION['sexpref'] == "straight" && $row['sexpref'] == "straight"){
        //       if ($row['gender'] == $_SESSION['gender']){
        //           continue;
        //       }
        //   }

          if($_SESSION['sexpref'] == "gay" && $row['sexpref'] == "straight"){
            if ($row['gender'] == $_SESSION['gender']){
                continue;
            }
        }

          $skipthisID = $row['id'];
        echo '<li>
                 <h3 class="name">'.$row['username'].'</h3>
                 <p>PICTURE</p>
                 <p class="age">'.$row['age'].'</p>
                 <p class="gender">'.$row['gender'].'</p>
                 <p class="sexpref">'.$row['sexpref'].'</p>
                 <p class="interest">'.$row['interest'].'</p>
                 <p class="city">'.$row['area'].'</p>
                 <p>'.$row['popularity'].'</p>
                 <a href="memberprofile.php?user='.$row['userID'].'">View Profile</a>
              </li>';
      }
  
    //  var_dump($userprofiles);

?>
    
    
  </ul>
</div>
</body>
<script src="list.min.js"></script>
<script>

var options = {
    valueNames: [ 'name', 'city', 'age', 'gender', 'sexpref', 'interest' ]
};

var hackerList = new List('hacker-list', options);



</script>
</html>