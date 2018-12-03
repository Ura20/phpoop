<?php
    require("classes/Item.php");
    require("classes/User.php");
    $item = new Item;

    session_start();

    $id= $_GET['id'];
    

    if(isset($_POST['submit'])){
        $iname = $_POST['itemname'];
        $idetails = $_POST['itemdetails'];
        $iquantity = $_POST['itemquantity'];
        $iprice = $_POST['itemprice'];

        $updateitem = $item->update($id, $iname, $idetails, $iquantity, $iprice);
        echo $updateitem;
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
                    <a class="nav-link" href="http://localhost/phpmysql/">Users</a>
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
    <div class="container">
        <div class="row justyfy-content-center">
            <div class="col mt-5 pt-5">
                <div class="card bg-white">
                    <div class="card-header"><h2>Edit Item</h2></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group pr-2 pl-2 pr-2">
                                <div class="form group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" name="itemname" value="<?php echo $row['item_name'];?>">
                                </div>
                                <div class="form group">
                                    <label>Item Content</label>
                                    <textarea cols="10" rows="10" class="form-control" name="itemdetails"><?php echo $row['item_details'];?></textarea>
                                </div>
                                <div class="form group">
                                    <label>Item Quantity</label>
                                    <input type="number" class="form-control" name="itemquantity" value="<?php echo $row['item_quantity'];?>">
                                </div>
                                <div class="form group">
                                    <label>Item Price</label>
                                    <input type="number" class="form-control" name="itemprice" value="<?php echo $row['item_price'];?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary form-control">Update Item </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>