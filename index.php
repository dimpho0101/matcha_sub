<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mat\materialize\css\mat.css">
    <!-- <link rel="stylesheet" href="css\style.css"> -->

</head>
<body>


<div class="topnav center-align" style="margin-top:20%">
  <!-- <a href="./index.php">Sign up</a> -->
  <h1>Matcha</h1>
  <a class="black-text homenav  modal-trigger" href="#signup">Register</a>
  <a class="black-text homenav  modal-trigger" href="#login">Log in</a>
</div>


<div class="index">
            <?php
            
        //     if (isset($_GET['userexists'])){
        //           echo '<p class="alert red"><span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>Account already exists!</p>';  
        //     }

        //     if (isset($_GET['usernameexists'])){
        //         echo '<p class="alert red"><span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>The username is taken!</p>
        //         ';  
        //   }
            ?>           
           
            </div>
            
<!-- 
        <div id="login" class="modal container">
                <form class="modal-content animate" action="./includes/functions.php" method="post">
                    <span onclick="document.getElementById('login').style.display='none'"
                    class="close" title="Close Modal">&times;</span>
                    <div class="container">
                        <p><h3>Login</h3></p>
                        <input type="text" placeholder="Enter Username" name="username" required>

                        <input type="password" placeholder="Enter Password" name="password" required>
                        <input type="hidden" name="login" value="login">
                        <button type="submit">Login</button>
                    </div>
                    <div class="container">
                        <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw">Forgot <a href="#pwdreset" onclick="document.getElementById('pwdreset').style.display='block';document.getElementById('login').style.display='none'">password?</a></span>
                    </div>
                </form>
            </div> -->

    <!-- Signup-->
    <div id="signup" class="modal container">
    <!-- Modal Content -->
        <form class="modal-content animate" action="./includes/functions.php" method="post">
            <span onclick="document.getElementById('signup').style.display='none'"
            class="close" title="Close Modal">&times;</span>
            <div class="container">
                <p><h3 class="black-text">Register</h3></p>
                <input type="text" placeholder="Enter Username" name="username" required>
                <input type="text" placeholder="Enter Firstname" name="firstname" required>
                <input type="text" placeholder="Enter Lastname" name="lastname" required>
                <input type="email" placeholder="Enter Email" name="email" required>
                <input type="password" id="psw" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <input type="hidden" name="register" value="register">
                <button class="waves-effect black btn" type="submit">Register</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <!-- <button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button> -->
                <span class="psw">Forgot <a href="#">password?</a></span>
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
        </form>
    </div> 
    <!-- a comment -->


    
    <div id="login" class="modal container">
<form class="modal-content animate" action="./includes/functions.php" method="post">
<span onclick="document.getElementById('login').style.display='none'"
            class="close" title="Close Modal">&times;</span>
  <div class="container">
  <p><h3 class="black-text">Log In</h3></p>
    <input type="text" placeholder="Enter Username" name="username" required>
    <input type="text" placeholder="Enter Password" name="password" required>
    <button class="waves-effect black btn" type="submit" name="login">Login</button>
  </div>
</form>
</div>

        <!-- pwdreset-->
        <div id="pwdreset" class="modal container">
    <!-- Modal Content -->
        <form class="modal-content animate" action="./includes/functions.php" method="post">
            <span onclick="document.getElementById('pwdreset').style.display='none'"
            class="close" title="Close Modal">&times;</span>
            <div class="container">
                <p><h3>Password reset</h3></p>
                <input type="email" placeholder="Enter Email" name="email" required>
                <input type="hidden" name="pwdreset" value="pwdreset">
                <button type="submit">Reset password</button>
            </div>
        </form>
    </div> 

    
</body>
<script src="mat\materialize\js\materialize.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

</script>
</html>




