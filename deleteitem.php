<?php
    require("classes/Item.php");

    $item = new Item;

    $id = $_GET['id'];

    $deleteitem = $item->delete($id);
?>
    