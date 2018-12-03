<?php

    require("classes/User.php");

session_start();
if(!empty($_SESSION['userid'])){
    header('location:users.php');
}

if(isset($_POST['login'])){
    $user = new User;
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $row = $user->login($uname, $pass);
}

else{
    echo "<p class='text-danger text-center'>Invalid Username or Password!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-4 mt-5 pt-5">
            <div class="form-group pt-2 pl-2 pr-2">
                <form method="post">
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control mt-3">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    <button type="submit" name="login" class="btn btn-primary brn-lg btn-block mt-3">Sign in</button>
                </form>
            </div>
        </div>
    </div>

      
    

    
</body>
</html>
