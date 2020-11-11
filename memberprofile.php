<?php
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
///insert record into views + 1popularity
try{
  $sql = $conn->prepare(" INSERT IGNORE INTO viewstats (user1,user2) VALUES (:userID,:viewersID)");
  $sql->bindParam(':userID', $_GET['user']);
  $sql->bindParam(':viewersID', $_SESSION['id']);
  $sql = $conn->prepare("UPDATE userProfile SET popularity=popularity+1  WHERE userId={$_GET['user']}");
//   var_dump($sql);
//   print_r($sql.'yooooo');
 // $sql->bindParam(':sports', $_POST['sports']);
 $sql->bindParam(':userId', $_GET['user']);
  $sql->execute();

  $sql->execute();
}catch(Exception $e)
{
  echo 'Error: ' . $e->getMessage();
}

// $sql = $conn->prepare("UPDATE userProfile SET popularity=popularity+1  WHERE userId={$_GET['uid']}");
// $sql->execute();
// $q = "UPDATE userProfile SET popularity=:popularity+1 WHERE userId={$_GET['uid']}";
$sql = $conn->prepare("UPDATE userProfile SET popularity=popularity+1  WHERE userId=:userId");
//   var_dump($sql);
//   print_r($sql.'yooooo');
 // $sql->bindParam(':sports', $_POST['sports']);
 $sql->bindParam(':userId', $_GET['user']);
  $sql->execute();

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
  <!-- <span class="sort" data-sort="name">Sort by name</span>
  <span class="sort" data-sort="city">Sort by area</span>
  <span class="sort" data-sort="age">Sort by age</span>
  <span class="sort" data-sort="gender">Sort by gender</span>
  <span class="sort" data-sort="sexpref">Sort by sexpref</span>
  <span class="sort" data-sort="interest">Sort by interest</span> -->

  <ul class="list">
      <?php
    //  $userprofiles = $dbh->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId JOIN interestTags on users.id = interesttags.userID WHERE interestTags.interest IN('travel')")->fetch();
    $uid = $_GET['user'];
  //  $stmt = $dbh->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId JOIN interestTags on users.id = interesttags.userID WHERE users.id =".$uid);
    $stmt = $conn->query("SELECT * FROM users JOIN userprofile on users.id = userprofile.userId JOIN interestTags on users.id = interesttags.userID WHERE users.id =".$uid);

    $skipthisID = 0;

      while ($row = $stmt->fetch()) {
        echo '<li><p>INTERESTS:</p>';
        if($skipthisID == $row['id']){
            // echo '<p>'.$row['interest'].'</p>';
            continue;   
        }
        
            echo '<h3 class="name">'.$row['username'].'</h3>
                 <p>PICTURE</p>
                 <p class="age">'.$row['age'].'</p>
                 <p class="gender">'.$row['gender'].'</p>
                 <p class="sexpref">'.$row['sexpref'].'</p>
                 <p class="interest">'.$row['interest'].'</p>
                 <p class="city">'.$row['area'].'</p>
                 <p> BIO:'.$row['bio'].'</p>
                 <p> lastLogin:'.$row['lastLogin'].'</p>
                 <p> onlineStatus:'.$row['onlineStatus'].'</p>
              </li>';
      }

      ///echo like/unlike button button

      $user1 = $_SESSION['id'];
      $user2 = $uid;
      $params = $user1.','.$user2;
      $stmt = $conn->query("SELECT * FROM likes WHERE user1 IN(".$params.") AND user2 IN(".$params.")");
     // $row = $stmt->fetchAll();
     $found = 0;

     if(count($stmt->fetchAll(PDO::FETCH_ASSOC)) < 1)
     {
        echo "<a href='like.php?uid=$uid'>LIKE</a>";
        exit();
     }
      while($row = $stmt->fetch()){
          //if()
            if($row['user1'] == 9/*$_SESSION['id']*/)
            {
              echo "<a href='?unlike=$uid'>UNLIKE</a>";
                break;
            }else{
                echo "<a href='?like=$uid'>LIKE BACK</a>";
                break;
            }
        // else if ($stmt->rowCount() == 2){
        //   echo "<a href='chat.php?user2=$uid'>OPEN CHAT</a>";
        // }
      }
     
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