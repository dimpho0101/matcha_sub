<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="mat\materialize\css\mat.css">
</head>
<body>
<!-- <div class="topnav">
  <a href="./index.php">Sign up</a>
  <a href="./login.php">Log in</a>
</div> -->

fgdgvgd

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

</body>

<script src="mat\materialize\js\materialize.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.getElementById('.login');
    var instances = M.Modal.init(elems);
  });

</script>
</html>
