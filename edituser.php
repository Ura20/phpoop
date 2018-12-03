<?php
    require("classes/User.php");
    $user = new User;
    $id = $_GET['id']; 
    $row = $user->selectOne($id);

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $updateuser = $user->update($id, $uname, $fname, $lname);


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
<style>
.bg-custom{
        background-color: yellow;
    }
</style>
</head>
<body>
<nav class="navbar fixed-top navbar_light bg-custom navbar-expand-lg">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="items.php">Items</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" name="welcome">Welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" name="logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row justyfy-content-center">
            <div class="col mt-5 pt-5">
                <div class="card bg-white">
                    <div class="card-header"><h2>Edit User</h2></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group pt-2 pl-2 pr-2">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="uname" value="<?php echo $row['username']?>">
                                </div>
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $row['firstname']?>">
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lastname']?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary form-control">Update User </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                 



</body>
</html>