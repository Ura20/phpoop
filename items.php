<?php
require("classes/User.php");
require("classes/Item.php");
$item = new Item;

session_start();

$id = $_SESSION['userid'];
$user = new User;
$userdetail = $user->selectone($id);

if(empty($_SESSION['userid'])){
    header('location:login.php');
}    
$row = $item->selectOne($id);

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
.bg-custome{
    color:yellow;
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
                    <a class="nav-link" name="welcome"><?php echo "Welcome, " . $userdetail['firstname'] . " " . $userdetail['lastname'];?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" name="logout">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col mt-5 pt-5">
                <div class="card bg-white">
                    <div class="card-header"><h2>Item List</h2></div>
                    <div class="card-body">
                        <form cation="" method="post">
                            <table class="table table-striped">
                                <thead>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Seller</th>
                                    <th>Content</th>
                                    <th> Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $result = $item->select();
                                if($result){
                                    foreach($result as $key => $row){
                                        $id = $row['item_id'];
                                        echo "<tr>";
                                        echo "<td>" . $row['item_id'] . "</td>";
                                        echo "<td>" . $row['item_name'] . "</td>";
                                        echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['item_details'] . "</td>";
                                        echo "<td>" . $row['item_quantity'] . "</td>";
                                        echo "<td>" . $row['item_price'] . "</td>";
                                        echo "<td>
                                        <a href='edititem.php?id=$id' class='btn btn-sm btn-primary'>Edit</a>
                                        <a href='deleteitem.php?id=$id' class='btn btn-sm btn-danger'>Delete</a>
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
                            <a href="additem.php" class="btn btn-sm btn-secondary">Add Item</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>