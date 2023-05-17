<?php


session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']))

{

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user dashborad</title>
    </head>
    <body>
        <h1> hello , <?php echo $_SESSION['user-name']; ?></h1>
        <a href="logout.php"> logout </a> 
        
    </body>
    </html>
    <?php
}
else{
 header("location : login.php");
 exit();
}