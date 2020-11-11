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

//echo views
//write a foreach that echos out the username of people who have viewed
//SELECt * from users Join viewstats on viewstats.user1 = $session[userid]
$stmt = $conn->query("SELECT * FROM viewstats JOIN users on viewstats.user1 = users.id where viewstats.user2 = 360");


echo "<h3>VIEWS<h3><br><br>";

var_dump($row = $stmt->fetch());
  while ($row = $stmt->fetch()) {
      var_dump($row['id']);
      var_dump($row['username']);
      die();

   // echo  "<a href='memberprofile.php?user=".$row['userID']'>$row['username']</a>";
//    echo "<a href='memberprofile.php?user={$row['id']}'>".$row['username']."</a>";
}
   
echo "<br><br>";
echo "<h3>LIKES<h3>";
// SELECT * FROM viewstats JOIN users on viewstats.user1 = users.id where viewstats.user2 = 301
$stmt = $conn->query("SELECT * FROM likes JOIN users on likes.user1 = users.id where likes.user2 = {$_SESSION['id']}");

while ($row = $stmt->fetch()) {
    // echo  "<a href='memberprofile.php?user=".$row['userID']'>$row['username']</a>";
    echo "<a href='memberprofile.php?user={$row['id']}'>".$row['username']."</a>";
 }


//echo likes
//SELECt * from users Join likes on likes.user1 = $session[userid]



//echo out usernames as <a> tag
// echo "<a href='memberprofile.php?user=$row['userID']'>$row['username']</a>";
?>