<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    
<div id="wrapper">
<h1>Chat system</h1><br>
<div class="chat_wrapper">
    <div id="chat"></div>
    <form method="POST">
        <textarea name="message" cols="30" rows="7"></textarea>
    </form>
    </div>
</div>

<script>
    $('textarea').keyup(function(e){
        if(e.which == 65){
            $('form').submit();
        alert('something');

        }
    });

    $('form').submit(function(){
        var message = $('textarea').val();

        $.post('http://localhost:8080/Matcha-2020-master/Matcha-2020-master/chat/chat.php, sendMessage&message='+message, function(
            response){
        alert(response);

        });

        return false;
    });
</script>
</body>
</html>