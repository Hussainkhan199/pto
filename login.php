<?php
    session_start();
    include "page.php";
     if(isset($_POST['uname']) && isset($_POST['password'])){

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

     }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("location :login.php?error=Username is requried");
        exit();
    }
    elseif(empty($pass)){
        header("location : login.php?error= Pssowrd is required");
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
        if($row ['user_name'] === $uname && $row ['password'] === $pass){
            echo "logged in" ;
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: user_dash.php");
            exit();
         } 
         else
         {
            header("location : login.php?error = Incorrect User name or password");
         }
    
    }
    else
    { 
        header("location : login.php");
        exit();
    }

    
?>
<head>
    <link rel="stylesheet" href="./css/form.css">
</head>


<form action="" method="post">

    <h2> LOGIN </h2>
    <?php  if (isset($_GET['error'])){?>
        <p class="error"> <?php  echo $_GET['error'];?></p>
    <?php }?>
    <label> User Name </label>
        <input type="text" name ="uname" placeholder="Username "><br/>
    <label> Password </label>
        <input type="password" name="password" placeholder="password"><br/>
    
    <button type="submit"> Login </button>
</form>

</body>
