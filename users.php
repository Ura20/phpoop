<?php
require("classes/User.php");

//Create an instance for User

session_start();
$id = $_SESSION['userid'];
$user = new User;
$row = $user->selectOne($id);
if(empty($_SESSION['userid'])){
    header('location:login.php');
}    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>

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
                    <a class="nav-link" name="welcome"><?php echo "Welcome, " . $row['firstname'] . " " . $row['lastname'];?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" name="logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class ="container">
        <div class="row">
            <div class="col mt-5 pt-5">
                <div class="card bg-white">
                    <div class="card-header"><h2>User List</h2></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <table class="table table-striped">
                                <thead>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
                                //call the select method
                                $result = $user->select();
                                if($result){
                                    foreach($result as $key => $row){
                                        $id = $row['user_id'];
                                        echo "<tr>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>
                                        <a href='edituser.php?id=$id' class='btn btn-sm btn-primary'>Edit</a>
                                        <a href='deleteuser.php?id=$id' class='btn btn-sm btn-danger'>Delete</a>
                                        </td>";
                                        echo "</tr>";
                                    } 
                                }    
                                
                                else{
                                    echo "<tr><td colspan='4' class='text-center'>No data available</td></tr>";
                                }
                                ?>
                                </tbody>
                                </table>
                                    <a href="adduser.php" class="btn btn-sm btn-secondary">Add User</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>