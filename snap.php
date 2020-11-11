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

// session_start();
if(!isset($_SESSION['id']))
{
    header("Location: index.php#");
}

// $stmt = $conn->query("SELECT * FROM user_images WHERE users_id ={$_SESSION['id']}");
// while ($row = $stmt->fetch()) {
//     // echo  "<a href='memberprofile.php?user=".$row['userID']'>$row['username']</a>";
// 	// echo "<img src="{$row['imageData']}">";
// 	echo "<img src='img/gal/{$row['imageData']}'>";
//  }

?>
<!DOCTYPE html>
<html>
<head>
<style>
.w3-theme-gradient {
  color: #000 !important;
  background:-webkit-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-moz-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-o-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-ms-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background: linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}


/* overlay stuff */
#overlay {
    position: absolute;
    display: block;
    width: 20%;
    height: 20%; 
    top: 100;
    left: 60;
    right: 70;
    bottom: 30;
    z-index: 2;
   
    
    cursor: pointer;

}

#text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    color: white;
}

.top_container
{
    width: 00px;
    margin: 30px auto;
}

#canvas
{
    display: none;
}
#canvas2
{
    display: none;
}

#emoji1
{
    position: absolute;
    visibility: hidden;
}

#emoji2
{
    position: absolute;
    visibility: hidden;
}
</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>matcha2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" type="text/css" media="screen" href="new.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/main2.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3-theme-indigo.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
<script src="js/prof.js"></script>
<script src="js/pic.js"></script>
    <script src="js/myajax.js"></script>
    <script src="js/thumbs2.js"></script>


<!--     <script src="js/myajax.js"></script> -->
</head>
<body style="background-image:url(img/newbg1.jpg); background-size: 100% 100%;    background-position: center;background-repeat: no-repeat;background-size: stretch;">

<?php

   // include "includes/header.php";
?>
  
  <article class="w3-container w3-half">
  <div class="top_container">
			<div id="overlay" class="overlay">
				<img class="text" height='100px' width='100px' id="emoji1" name="emoji1" onclick="off()">
				<img onclick="off2()" class="text" height='100px' width='100px' id="emoji2" name="emoji2"  >
			</div>
			<div class="video">
				<img id="editpic" class="video" width="500px">
				<video id='video'>Stream not available...</video>
			</div>
			<div class="emo_list">
			<img id="e2" src="emojis/1.png" height='50px' width='50px' style="margin: 19px">
			<img id="e1" src="emojis/2.png" height='50px' width='50px' style="margin: 19px">
			<img id="e3" src="emojis/3.png" height='50px' width='50px' style="margin: 19px">
			<img id="e4" src="emojis/4.jpg" height='50px' width='50px' style="margin: 19px">
			<br>
		</div>
			<button id="photo_button" class="w3-button" >Take Photo</button>
			<!-- <button id="Uploadbtn" class="button">Upload</button> -->
			<!-- <label id="testme" for="file" class="lbbutton">Css only file upload button</label> -->
		<!-- 	<input id="file" class="file-upload__input" type="file" name="file-upload"> -->
			<!-- <div class="file-upload">
			</div> -->
			<!-- <canvas id="canvas2"></canvas> -->
			<button id="save_photo" class="w3-button w3-grey" style="display:none;">save</button>
		<!-- 	<canvas id="canvas"></canvas> -->
		</div>
		

<br>

<canvas id="canvas"></canvas>


<div class="bottom_container">
<div id="photos"></div>
</div> 
<script>
 function off() {
		document.getElementById("emoji1").style.visibility = "hidden";
		document.getElementById("emoji1").removeAttribute('src');

	}
	function off2() {
		document.getElementById("emoji2").style.visibility = "hidden";
		document.getElementById("emoji2").removeAttribute('src');

	}

	emo1 = document.getElementById("e1");
	emo2 = document.getElementById("e2");
	emo3 = document.getElementById("e3");
	emo4 = document.getElementById("e4");

	
	emo1.addEventListener("click", function(){switchsrc(emo1);}, false);
	emo2.addEventListener("click", function(){switchsrc(emo2);}, false);
	emo3.addEventListener("click", function(){switchsrc(emo3);}, false);
	emo4.addEventListener("click", function(){switchsrc(emo4);}, false);


	function switchsrc(emonew)
	{
		document.getElementById("emoji1").style.visibility = "visible";
		if (document.getElementById("emoji1").hasAttribute("src"))
		{
			document.getElementById("emoji2").style.visibility = "visible";
			var emoswitch = document.getElementById("emoji2");
		}
		else
		{
			var emoswitch = document.getElementById("emoji1");
		}
		var ovl = document.getElementById("overlay");
		switch (emonew.id)
		{
			case "e1" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "10px";
				break;
			case "e2" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "200px";
				break;
			case "e3" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "400px";
				break;
			case "e4" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "10px";
				break;
			case "e5" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "200px";
				break;
			case "e6" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "400px";
				break;
			case "e7" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "10px";
				break;
			case "e8" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "200px";
				break;
			case "e9" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "400px";
				break;
			case "e10" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "200px";
				break;
		}
	} 

	function setedit(imgid) {
		//alert(imgid);
		var hv = document.getElementById("video");
		hv.style.display = "none";
		//alert(hv.style.display);
		var movesrc = document.getElementById(imgid).src;
		//alert(movesrc);
		document.getElementById("editpic").src = movesrc;
		//alert(imgid);
	    video = document.getElementById("editpic");

}
</script>
<br>
<form action="functions/upweb.php" method="post" enctype="multipart/form-data">
<br>
<!-- <input type="submit" id="webcamupload" value="submit"> -->
</form>

 
  <div>
<!--   onsubmit="ajaxupload();"
action="functions/upload.php"
action="functions/upload.php"
 -->      <!--  <form method="post" enctype="multipart/form-data">  -->
        <p>Select imagesdfsd to upload</p>
        <input type="file" name="userpic" id="userpic">
       <input type="submit" onclick="ajaxupload();" value="Upload Ajax Image" name="submit">
     <!--   <button id="fileUpload" type="submit">Upload!!!</button> -->
        
    <!--  </form>  -->
      
  </div>
  </article>








  

  

  

  <br>
  
</div>
<div class="w3-container w3-theme-l3 w3-cell w3-middle w3-padding-large w3-mobile w3-animate-right">
  <p>Preview</p>
  <canvas id="canvas2"></canvas>
  <canvas id="canvas"></canvas>
</div>
<div class="w3-container w3-theme-l3 w3-cell w3-middle w3-padding-large w3-mobile w3-animate-right">
  <p>Gallery</p>
  <div id="mygal"></div>
</div>

</div>

<!-- MODAL -->


<script src="pick.js"></script>
<script>

  function showlogin() {
    document.getElementById("modalreg").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide";
    document.getElementById("modalogin").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-show";
    
  }

  function showreg() {
    document.getElementById("modalogin").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide";
    document.getElementById("modalreg").className = "w3-container w3-center w3-theme-d1 w3-animate-left w3-mobile w3-show";
    document.getElementById("regform").addEventListener("submit", function(e){
    e.preventDefault();
    //ajax_register();
   // alert("submitting");
});
    
  }

  function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!-- MODALEND -->


</html>
