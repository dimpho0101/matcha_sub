<?php
//print_r($_FILES['userImage']);
 print_r($_FILES['userImage']['tmp_name'][0]);

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

///////////////ERRORS

function countUsersImages(){
    //count number of records made by the logged in user    
}
///////////////////////////////////////////////////////////
// C:\Users\t-diputu\Desktop\matcha\tmp\php9B03.tmpC:\Users\t-diputu\Desktop\matcha\tmp\php9B03.tmpC:\Users\t-diputu\Desktop\matcha\tmp\php9B14.tmpC:\Users\t-diputu\Desktop\matcha\tmp\php9B24.tmpC:\Users\t-diputu\Desktop\matcha\tmp\php9B25.tmpC:\Users\t-diputu\Desktop\matcha\tmp\php9B36.tmp


//////////////////////////////////////////////////////////////
// $img = ($_FILES['userImage']['tmp_name']);

// foreach ($img as $key => $value) 
// {
//     echo $value;
// }
// die();

////////////////ERRORS
if (count($_FILES) > 0) {

    if (is_uploaded_file($_FILES['userImage']['tmp_name'][0])) {
        //require_once "../Matcha-2020-master/config/database.php";
       
        foreach ($_FILES['userImage']['tmp_name'] as $key => $value)
        {
           // echo $value;
           $imgData = addslashes(file_get_contents($value));
           $imageProperties = getimageSize($value);
           
             $sql = "INSERT INTO user_images(imageType ,imageData , users_id) VALUES('{$imageProperties['mime']}', '{$imgData}', 9)";
        }
        
     //   $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
    
    try{
        $current_id = $conn->prepare($sql);
        $current_id->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
       
        if (isset($current_id)) {
         //   print_r ($current_id);
            header("Location: listimg.php");
        }
    }

}


?>

<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css"/>
</HEAD>
<BODY>
    <form name="frmImage" enctype="multipart/form-data" action=""
        method="post" class="frmImageUpload">
        <label>Upload Image File:</label><br />
         <input name="userImage[]" type="file" class="inputFile"  required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
         <input name="userImage[]" type="file" class="inputFile" required/>
          <input type="submit" value="Submit" class="btnSubmit" />
    </form>
    </div>
</BODY>
</HTML>