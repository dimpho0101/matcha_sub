<?php
    session_start();

    // if(isset($_SESSION['profileCompleted'])){
    //     header("Location: home.php");
    // }else{
    //     header("Location: index.php");
    // }
?>
<!-- <link rel="stylesheet" href="../css/style.css"> -->


    <div class="questionnaire" text-align="center">
        <form action="profileFunctions.php" name="profile" enctype="multipart/form-data" method="post">
        <label for="pet-select">Tell us more about you</label><br>
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
            <input type="text" name="age" min="18" placeholder="Please enter your age" required> <br>
            <input id="main" type="text" name="bio" placeholder="Short bio about you :)"value="" maxlength="500" required> <br>
            <label>Interests:</label><br>
            <input type="checkbox"  name="food" value="food">
            <label for="vehicle1"> Food</label><br>
            <input type="checkbox"  name="travel" value="travel">
            <label for="vehicle2"> Travel</label><br>
            <input type="checkbox"  name="books" value="books">
            <label for="vehicle3"> Books</label><br>
            <input type="checkbox"  name="sports" value="sport">
            <label for="vehicle3"> Sports</label><br><br>
            <label>Upload Image File:</label><br />
            <select name="area">
            <option  value="">--Please choose your location--</option>
            <option value="marshalltown">marshalltown</option>
            <option value="sandton">sandton</option>
            <option value="rosebank">rosebank</option>
            <option value="soweto">soweto</option>
            </select><br>
         <input name="userImage[]" type="file" class="inputFile"  required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
            <button type="submit">Submit</button>
        </form>
    </div>